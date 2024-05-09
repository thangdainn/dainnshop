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
        $this->setTotalItemCart($data);

        $this->load->view("footer", $data);
    }
    public function detail($id)
    {
        $this->load->view("header");

        $productModel = $this->load->model("ProductModel");
        $data['product'] = $productModel->findById($id);

        $imageModel = $this->load->model("ImageModel");
        $data['images'] = $imageModel->findByProduct_Id($id);

        $sizeModel = $this->load->model("SizeModel");
        $data['sizes'] = $sizeModel->findByProduct_Id($id);

        $reviewModel = $this->load->model("ReviewModel");
        $data['reviews'] = $reviewModel->findByProduct_Id($id);

        $userModel = $this->load->model("UserModel");
        $data['userReviews'] = $userModel->findByProduct_Id($id);

        $this->load->view("cpanel/productDetail", $data);
        $this->setTotalItemCart($data);

        $this->load->view("footer", $data);
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
                <div data-value="' . $product['id'] . '" class="product-item">
                    <div class="product product_filter">
                        <div class="product_image">
                            <img src="' . BASE_URL . '/upload/images/' . $product['img'] . '" loading="lazy" alt="">
                        </div>';
                if ($product['type'] == "sale") {
                    $html .= '
                        <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>sale</span></div>
                        <div class="product_info">
                            <h6 class="product_name">' . $product['name'] . '</h6>
                            <div class="product_price">$' . $product['sale'] . '<span>$' . $product['price'] . '</span></div>
                        </div>';
                } else {
                    if ($product['type'] == "new") {
                        $html .= '<div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>new</span></div>';
                    }
                    $html .= '<div class="product_info">
                                    <h6 class="product_name">' . $product['name'] . '</h6>
                                    <div class="product_price">$' . $product['price'] . '</div>
                                </div>';
                }
                $html .= '</div>
                        </div>';
            }
            $html .= '<input type="hidden" id="totalPage" value=' . $totalPage . '>';
        }

        echo $html;
    }
}
