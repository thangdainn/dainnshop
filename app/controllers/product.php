<?php

class product extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->product();
    }


    public function product()
    {
        $this->load->view("header");
        $this->load->view("cpanel/productDetail");
        $this->load->view("footer");
    }
    public function detail($id)
    {
        $this->load->view("header");

        $product = $this->load->model("ProductModel");
        $data['product'] = $product->findById($id);

        $this->load->view("cpanel/productDetail");
        $this->load->view("footer");
    }

    public function paging()
    {
        $page = $_POST['page'];
        $limit = $_POST['limit'];
        $keyword = $_POST['keyword'];
        $categoryId = $_POST['categoryId'];
        if (isset($_POST['brandIds'])) {
            $brandIds = $_POST['brandIds'];
        } else {
            $brandIds = null;
        }
        if (isset($_POST['sizeIds'])) {
            $sizeIds = $_POST['sizeIds'];
        } else {
            $sizeIds = null;
        }
        $sortBy = $_POST['sortBy'];
        // echo $sortBy;
        switch ($sortBy) {
            case 'Latest':
                $sortBy = "p.create_at DESC";
                break;
            case 'Price: Low to Hight':
                $sortBy = "p.sale ASC";
                break;
            case 'Price: Hight to Low':
                $sortBy = "p.sale DESC";
                break;
            default:
                $sortBy = null;
                break;
        }
        $priceInRange = $_POST['priceInRange'];
        $productModel = $this->load->model("ProductModel");
        $products = $productModel->findByDynamicFilter($page, $limit, $priceInRange, $keyword, $categoryId, $brandIds, $sizeIds, $sortBy);
        $totalItem = $productModel->countByDynamicFilter($priceInRange, $keyword, $categoryId, $brandIds, $sizeIds, $sortBy);
        $totalPage = ceil($totalItem / $limit);
        $html = '';
        if ($totalItem > 0) {
            foreach ($products as $key => $product) {
                $html .= '
                <div class="product-item">
                    <div class="product discount product_filter">
                        <div class="product_image">
                            <img src="' . BASE_URL . '/upload/images/' . $product['img'] . '" alt="">
                        </div>
                        <div class="favorite favorite_left"></div>
                        <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
                        <div class="product_info">
                            <h6 class="product_name"><a href="' . BASE_URL . '/product/detail/' . $product['id'] . '">' . $product['name'] . '</a></h6>
                            <div class="product_price">' . $product['sale'] . '<span>' . $product['price'] . '</span></div>
                        </div>
                    </div>
                    <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                </div>';
            }
            $html .= '<input type="hidden" id="totalPage" value=' . $totalPage . '>';
        }

        echo $html;
    }
}
