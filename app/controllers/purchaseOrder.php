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

    public function orderDetail()
    {
        if (isset($_POST['orderId'])) {
            $orderId = $_POST['orderId'];

            $orderModel = $this->load->model("PurchaseOrderModel");
            $orderDetails = $orderModel->viewDetailByOrderId($orderId);
            $html = '';
            foreach ($orderDetails as $item) {
                $html .= '<tr>
                    <td>' . $item['product_name'] . '</td>
                    <td><img class="product_image" src="' . BASE_URL . '/upload/images/' . $item['product_image'] . '" alt="Product Image"></td>
                    <td>' . $item['size'] . '</td>
                    <td>' . $item['quantity'] . '</td>
                    <td>' . $item['total'] . '</td>
                </tr>';
            }
            echo $html;
        } else {
            echo "Error: Missing orderId";
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
                    <th scope="row">'. $order['id'] .'</th>
                    <td>'. $order['resipient_name'] .'</td>
                    <td>'. $order['resipient_phonenumber'] .'</td>
                    <td>'. $order['delivery_address'] .'</td>
                    <td><a href="#" data-id="'. $order['id'] .'" class="btn btn_detail">View Details</a></td>
                </tr>';
            }
        }
        else {
            $html .= '<span class="order_none">Không có đơn hàng</span>';
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
