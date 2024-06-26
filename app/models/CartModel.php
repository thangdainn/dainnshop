<?php

class CartModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getInfoSessionCart ($productId, $sizeId) {
        $sql = "SELECT s.name as size ,p.name as product_name, p.img as product_img , case WHEN type = 'sale' THEN sale
        ELSE price END AS product_cost FROM `products` p, `sizes` s WHERE p.id = ? AND s.id = ?";
        $result = $this->db->select($sql, $productId, $sizeId);
        return $result;
    }

    public function getTotalQuantityForUser($userId) {
        $sql = "SELECT COUNT(*) as total FROM `cart` WHERE user_id = ?";
        $result = $this->db->select($sql,$userId);
        return $result;
    }

    public function findAll()
    {
        $sql = "SELECT * FROM `cart`";
        $result = $this->db->select($sql);
        return $result;
    }

    public function findByUserId($id)
    {
        $sql = "SELECT c.id as cart_id, c.product_id as product_id, c.size_id as size_id, s.name as size, p.name as product_name , p.img as product_img , c.amount as amount , case WHEN p.type = 'sale' THEN p.sale
        ELSE p.price END AS cost FROM `cart` c, `products` p, `sizes` s WHERE p.id = c.product_id AND s.id = c.size_id AND c.user_id = ?";
        $result = $this->db->select($sql, $id);
        return $result;
    }

    public function findCartItem($userId, $productId, $sizeId) {
        $sql = "SELECT * FROM `cart` WHERE user_id = ? AND product_id = ? AND size_id = ?";
        $result = $this->db->select($sql, $userId, $productId, $sizeId);
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
