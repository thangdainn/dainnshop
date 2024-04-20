<?php

class CartModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        $sql = "SELECT * FROM `cart`";
        $result = $this->db->select($sql);
        return $result;
    }

    public function findByUserId($id)
    {
        $sql = "SELECT c.id as cart_id, c.product_id as product_id, c.size_id as size_id, p.name as product_name , p.img as product_img , c.amount as amount , case WHEN p.type = 'sale' THEN p.sale
        ELSE p.price END AS cost FROM `cart` c, `products` p WHERE p.id = c.product_id AND c.user_id = ?";
        $result = $this->db->select($sql, $id);
        return $result;
    }

    public function addCart($userId, $productId, $amount, $sizeId) {
        $sql = "INSERT INTO `cart`(`user_id`, `product_id`, `amount`, `size_id`) VALUES (?,?,?,?)";
        $result = $this->db->execute($sql, $userId, $productId, $amount, $sizeId);
        return $result;
    }

    public function updateCart($amount, $cartId) {
        $sql = "UPDATE `cart` SET amount = ? WHERE id = ?";
        $result = $this->db->execute($sql, $amount, $cartId);
        return $result;
    }

    public function deleteCart($cartId) {
        $sql = "DELETE FROM `cart` WHERE id = ?";
        $result = $this->db->execute($sql,$cartId);
        return $result;
    }

    public function deleteCartByUserId($userId) {
        $sql = "DELETE FROM `cart` WHERE user_id = ?";
        $result = $this->db->execute($sql,$userId);
        return $result;
    }
}
