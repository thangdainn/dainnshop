<?php

class ProductModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll($page)
    {
        $sql = "SELECT * FROM products LIMIT " . $page . ", 16";
        $result = $this->db->select($sql);
        return $result;
    }

    public function countFindAll()
    {
        $sql = "SELECT * FROM products";
        $result = $this->db->count($sql);
        return $result;
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM products WHERE id = ?";
        $result = $this->db->select($sql, $id);
        return $result;
    }

    public function findByCategoryId($categoryId)
    {
        $sql = "SELECT * FROM products p JOIN categories c ON p.category_id = c.id WHERE c.id = ?";
        $result = $this->db->select($sql, $categoryId);
        return $result;
    }

    public function findByDynamicFilter($page, $limit, $keyword = null, $categoryId = null, $brandId = null, $sizeId = null)
    {
        $sql = "SELECT DISTINCT p.* FROM products p 
                JOIN products_size ps ON p.id = ps.product_id 
                JOIN sizes s ON ps.size_id = s.id 
                JOIN brands b ON p.brand_id = b.id 
                JOIN categories c ON p.category_id = c.id 
                WHERE p.status = 1 AND ps.quantity > 0";
        if ($keyword !== null) {
            // $keyword = "%" . $keyword . "%";
            $sql .= " AND p.name LIKE ?";
        }
        if ($categoryId !== null) {
            $sql .= " AND c.id = ?";
        }
        if ($brandId !== null) {
            $sql .= " AND b.id = ?";
        }
        if ($sizeId !== null) {
            $sql .= " AND s.id = ?";
        }
        $offset = $page * $limit;
        $sql .= " LIMIT " . $offset . ", " . $limit;
        $result = $this->db->select($sql, $keyword, $categoryId, $brandId, $sizeId);
        return $result;
    }
    public function countByDynamicFilter($keyword = null, $categoryId = null, $brandId = null, $sizeId = null)
    {
        $sql = "SELECT DISTINCT p.* FROM products p 
                JOIN products_size ps ON p.id = ps.product_id 
                JOIN sizes s ON ps.size_id = s.id 
                JOIN brands b ON p.brand_id = b.id 
                JOIN categories c ON p.category_id = c.id 
                WHERE p.status = 1 AND ps.quantity > 0";
        if ($keyword !== null) {
            // $keyword = "%" . $keyword . "%";
            $sql .= " AND p.name LIKE ?";
        }
        if ($categoryId !== null) {
            $sql .= " AND c.id = ?";
        }
        if ($brandId !== null) {
            $sql .= " AND b.id = ?";
        }
        if ($sizeId !== null) {
            $sql .= " AND s.id = ?";
        }

        $result = $this->db->count($sql, $keyword, $categoryId, $brandId, $sizeId);
        return $result;
    }
}
