<?php

class ProductModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll($page, $limit, $keyword)
    {
        $keyword = "%" . $keyword . "%";
        $sql = "SELECT * FROM products WHERE status = 1 AND name LIKE ? LIMIT " . $page . ", " . $limit;
        $result = $this->db->select($sql, $keyword);
        return $result;
    }

    public function countFindAll($keyword)
    {
        $keyword = "%" . $keyword . "%";
        $sql = "SELECT * FROM products WHERE status = 1 AND name LIKE ?";
        $result = $this->db->count($sql, $keyword);
        return $result;
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM products WHERE id = ?";
        $result = $this->db->select_one($sql, $id);
        return $result;
    }

    public function findByCategoryId($categoryId)
    {
        $sql = "SELECT * FROM products p JOIN categories c ON p.category_id = c.id WHERE c.id = ?";
        $result = $this->db->select($sql, $categoryId);
        return $result;
    }

    public function findByDynamicFilter($page, $limit, $priceInRange, $keyword = null, $categoryId = null, $brandIds = null, $sizeIds = null, $sortBy = null)
    {
        $sql = $this->commonSqlFilter($keyword, $categoryId, $brandIds, $sizeIds, $sortBy);

        $priceFrom = $priceInRange[0];
        $priceTo = $priceInRange[1];

        $offset = $page * $limit;
        $sql .= " LIMIT " . $offset . ", " . $limit;

        $result = $this->db->select($sql, $keyword, $categoryId, $priceFrom, $priceTo);
        return $result;
    }
    public function countByDynamicFilter($priceInRange, $keyword = null, $categoryId = null, $brandIds = null, $sizeIds = null, $sortBy = null)
    {
        $sql = $this->commonSqlFilter($keyword, $categoryId, $brandIds, $sizeIds, $sortBy);

        $priceFrom = $priceInRange[0];
        $priceTo = $priceInRange[1];

        $result = $this->db->count($sql, $keyword, $categoryId, $priceFrom, $priceTo);
        return $result;
    }

    public function commonSqlFilter(&$keyword, &$categoryId, $brandIds, $sizeIds, $sortBy)
    {
        $sql = "SELECT DISTINCT p.* FROM products p 
                JOIN products_size ps ON p.id = ps.product_id 
                JOIN sizes s ON ps.size_id = s.id 
                JOIN brands b ON p.brand_id = b.id 
                JOIN categories c ON p.category_id = c.id 
                WHERE p.status = 1 AND ps.quantity > 0";
        if ($keyword !== null) {
            $keyword = "%" . $keyword . "%";
            $sql .= " AND p.name LIKE ?";
        }
        if ($categoryId !== null && intval($categoryId) != 0) {
            $sql .= " AND c.id = ?";
        } else {
            $categoryId = null;
        }
        if ($brandIds !== null && count($brandIds) > 0) {
            $sqlBrand = " AND (";
            foreach ($brandIds as $brandId) {
                $sqlBrand .= " b.id = " . $brandId . " OR";
            }
            $sqlBrand = substr($sqlBrand, 0, -2);
            $sqlBrand .= ")";
            $sql .= $sqlBrand;
        }
        if ($sizeIds !== null && count($sizeIds) > 0) {
            $sqlSize = " AND (";
            foreach ($sizeIds as $sizeId) {
                $sqlSize .= " s.id = " . $sizeId . " OR";
            }
            $sqlSize = substr($sqlSize, 0, -2);
            $sqlSize .= ")";
            $sql .= $sqlSize;
        }

        $sql .= " AND (p.price >= ? AND p.price <= ?)";

        if ($sortBy !== null) {
            $sql .= " ORDER BY " . $sortBy;
        }

        return $sql;
    }
}
