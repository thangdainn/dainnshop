<?php

class ProductSizeModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function findByProduct_IdAndSize_Id($product_id, $size_id)
    {
        $sql = "SELECT * FROM products_size WHERE product_id = ? AND size_id = ?";
        $result = $this->db->select_one($sql, $product_id, $size_id);
        return $result;
    }
    public function updateQuantity($quantity, $product_id, $size_id, $update_at)
    {
        $sql = "UPDATE products_size SET quantity = ?, update_at = ? WHERE product_id = ? AND size_id = ?";
        $result = $this->db->execute($sql, $quantity, $update_at, $product_id, $size_id);
        return $result;
    }
    
}
