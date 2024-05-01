<?php

class purchaseOrder extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->purchaseOrder();
    }

    public function cancelOrder() {
        if (isset($_POST['orderId'])) {
            $orderId = $_POST['orderId'];
            $orderModel = $this->load->model("PurchaseOrderModel");
            $orderModel -> cancelOrder($orderId);
        } else {
            echo "Error: Missing orderId";
        }
    }

    public function orderDetail()
    {
        if (isset($_POST['orderId'])) {
            $orderId = $_POST['orderId'];

            $orderModel = $this->load->model("PurchaseOrderModel");
            $orderDetail = $orderModel->viewDetailByOrderId($orderId);
            $html = '';
            $totalCost = 0;
            foreach ($orderDetail as $item) {
                $totalCost += $item['total'];
                $html .= '<tr>
                    <input type="hidden" id="product-id" value=' . $item['product_id'] . '">
                    <td>' . $item['product_name'] . '</td>
                    <td><img class="product_image" src="' . BASE_URL . '/upload/images/' . $item['product_image'] . '" alt="Product Image"></td>
                    <td>' . $item['size'] . '</td>
                    <td>' . $item['quantity'] . '</td>
                    <td>' . $item['total'] . '$</td>
                </tr>';
            }
                $html .= '<tr>
                    <td>Total Cost</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>'.$totalCost .'$</td>
                </tr>';
            echo $html;
        } else {
            echo "Error: Missing orderId";
        }
    }

    public function showReview()
    {
        if (isset($_POST['orderId'])) {
            $orderId = $_POST['orderId'];

            $orderModel = $this->load->model("PurchaseOrderModel");
            $orderDetail = $orderModel->viewDetailByOrderId($orderId);
            $html = '';
            $html .= '
                <form>
                    <select id="productSelected" name="product">
                        <option value="">Select a product</option>';
            foreach ($orderDetail as $item) {
                if ($item['is_reviewed'] == 0) {
                    $html .= '<option value="' . $item['product_id'] . '">' . $item['product_name'] . '</option>';
                }
            }
            $html .= '   
                    </select>
                </form>
                <label for="rating">Rating (0-5):</label>
                <div class="star-rating">
                    <input type="radio" name="rating1" id="rating1">
                    <label for="rating1" class="fa fa-star"></label>
                    <input type="radio" name="rating2" id="rating2">
                    <label for="rating2" class="fa fa-star"></label>
                    <input type="radio" name="rating3" id="rating3">
                    <label for="rating3" class="fa fa-star"></label>
                    <input type="radio" name="rating4" id="rating4">
                    <label for="rating4" class="fa fa-star"></label>
                    <input type="radio" name="rating5" id="rating5">
                    <label for="rating5" class="fa fa-star"></label>
                </div>
                <label for="comment">Comment:</label>
                <textarea class="commentInput" id="comment" name="comment"></textarea>
                <button class="btn btn_review_submit" type="submit">Review</button>
                
                ';
            echo $html;
        } else {
            echo "Error: Missing orderId";
        }
    }

    public function review()
    {
        if (
            isset($_POST['userId'])
            && isset($_POST['productId'])
            && isset($_POST['star'])
            && isset($_POST['message'])
            && isset($_POST['orderId'])
        ) {
            $userId = $_POST['userId'];
            $productId = $_POST['productId'];
            $star = $_POST['star'];
            $message = $_POST['message'];
            $orderId = $_POST['orderId'];

            $userModel = $this->load->model("UserModel");
            $user = $userModel->findById($userId);

            $fullName = $user['fullname'];
            $email = $user['email'];

            $reviewModel = $this->load->model("ReviewModel");
            $reviewModel->addReview($productId, $userId, $fullName, $email, $message, $star);

            $orderModel = $this->load->model("PurchaseOrderModel");
            $orderModel->isReviewed($orderId, $productId);
        } else {
            echo "Error: Missing data";
        }
    }

    public function orderByStatus()
    {
        $orderStatusId = $_POST['orderStatusId'];
        $userID = $_POST['userId'];

        $orderModel = $this->load->model("PurchaseOrderModel");
        $orders = $orderModel->findByOrderStatusId($userID, $orderStatusId);
        $html = '';
        if (!empty($orders)) {
            foreach ($orders as $order) {
                $html .= '
                <tr>
                    <th scope="row">' . $order['id'] . '</th>
                    <td>' . $order['resipient_name'] . '</td>
                    <td>' . $order['resipient_phonenumber'] . '</td>
                    <td>' . $order['delivery_address'] . '</td>
                    <td class="actions"><a href="#" data-id="' . $order['id'] . '" class="btn btn_detail">View Details</a>';
                if ($order['id_order_status'] == 1) {
                    $html .= '<a href="#" data-id="' . $order['id'] . '" class="btn btn_cancel">Cancel</a>';
                }
                if ($order['id_order_status'] == 6) {
                    $html .= '<a href="#" data-id="' . $order['id'] . '" class="btn btn_review">Review</a>';
                }
                '</td>
                </tr>';
            }
        }
        else {
            $html .= '<span class="order_none">No cart here</span>';
        }
        echo $html;
    }

    public function purchaseOrder()
    {

        $this->load->view("header");
        $userID = Session::getUserId();

        $orderModel = $this->load->model("PurchaseOrderModel");
        $data['orders'] = $orderModel->findByUserId($userID);
        $this->load->view("cpanel/purchaseOrder", $data);
        $this->load->view("footer");
        
    }
}
