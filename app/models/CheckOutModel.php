<?php

class CheckOutModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addOrder($userId, $fullName, $phone, $address) {
        $sql = 'INSERT INTO `order`(`user_id`, `resipient_name`, `resipient_phonenumber`, `delivery_address`, `id_order_status`) VALUES (?,?,?,?,?)';
        $result = $this->db->execute($sql, $userId, $fullName, $phone, $address, 1);
        $order_id = $this->db->lastInsertId();
        return $order_id;
    } 

    public function addOrderDetail($orderId, $productId, $sizeId, $total, $quantity) {
        $sql = 'INSERT INTO `order_detail`(`order_id`, `product_id`, `size_id`, `total`, `quantity`) VALUES (?,?,?,?,?)';
        $result = $this->db->execute($sql, $orderId, $productId, $sizeId, $total, $quantity);
        return $result;
    }
}