<?php

class ProductModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        $sql = "SELECT * FROM products";
        $result = $this->db->select($sql);
        return $result;
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM products WHERE id = ?";
        $result = $this->db->select($sql, $id);
        return $result;
    }
}
