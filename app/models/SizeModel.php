<?php

class SizeModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        $sql = "SELECT * FROM sizes WHERE status = 1";
        $result = $this->db->select($sql);
        return $result;
    }

    public function findByProduct_Id($id)
    {
        $sql = "SELECT s.id, s.name, ps.quantity FROM sizes s 
                INNER JOIN products_size ps ON s.id = ps.size_id 
                INNER JOIN products p ON p.id = ps.product_id 
                WHERE ps.quantity >= 0 
                    AND s.status > 0 
                    AND p.status > 0 
                    AND p.id = ?";
        $result = $this->db->select($sql, $id);
        return $result;
    }
}
