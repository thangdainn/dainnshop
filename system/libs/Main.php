<?php

class Main
{
    public $url;
    public $controllerName = "index";
    public $methodName = "index";
    public $controllerPath = "app/controllers/";
    public $controller;
    public $routes;

    public function __construct()
    {
        // $this->routes = new Route();
        $this->getUrl();
        $this->getController();
        $this->getMethod();
    }

    public function getUrl()
    {
        $this->url = isset($_GET["url"]) ? $_GET["url"] : NULL;

        if ($this->url != NULL) {
            $this->url = rtrim($this->url, "/");
            $this->url = explode("/", filter_var($this->url, FILTER_SANITIZE_URL));
            if ($this->url[0] == "admin") {
                $this->controllerPath .= "admin/";
                unset($this->url[0]);
                $this->url = array_values($this->url);
                header("Location:" . BASE_URL . "/admin/views/login.php");
                
                exit();
            }
        } else {
            unset($this->url);
        }
    }

    public function getController()
    {
        if (!isset($this->url[0])) {
            include $this->controllerPath . $this->controllerName . ".php";
            $this->controller = new $this->controllerName();
        } else {
            $this->controllerName = $this->url[0];
            $fileName = $this->controllerPath . $this->controllerName . ".php";
            if (file_exists($fileName)) {
                include $fileName;
                if (class_exists($this->controllerName)) {
                    $this->controller = new $this->controllerName();
                } else {
                }
            } else {
                header("Location:" . BASE_URL . "/index/notFound");
            }
        }
    }

    public function getMethod()
    {
        if (isset($this->url[2])) {
            $this->methodName = $this->url[1];
            if (method_exists($this->controller, $this->methodName)) {
                $this->controller->{$this->methodName}($this->url[2]);
            } else {
                header("Location:" . BASE_URL . "/index/notFound");
            }
        } else {
            if (isset($this->url[1])) {
                $this->methodName = $this->url[1];
                if (method_exists($this->controller, $this->methodName)) {
                    $this->controller->{$this->methodName}();
                } else {
                    header("Location:" . BASE_URL . "/index/notFound");
                }
            } else {
                if (method_exists($this->controller, $this->methodName)) {
                    $this->controller->{$this->methodName}();
                } else {
                    header("Location:" . BASE_URL . "/index/notFound");
                }
            }
        }
    }
}
