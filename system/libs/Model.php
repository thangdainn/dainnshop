<?php

class Model
{
    protected $db = array();
    public function __construct()
    {
        $conn = 'mysql:dbname=do_an_web; host=localhost; charset=utf8';
        $username = 'root';
        $password = '';
        $this->db = new Database($conn, $username, $password);
    }
}
