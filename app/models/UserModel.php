<?php

class UserModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        $sql = "SELECT * FROM users WHERE status = 1";
        $result = $this->db->select($sql);
        return $result;
    }

    public function findByProduct_Id($id)
    {
        $sql = "SELECT DISTINCT u.id, u.fullname, u.image FROM users u 
                JOIN reviews r ON u.id = r.user_id 
                JOIN products p ON p.id = r.product_id 
                WHERE p.id = ?";
        $result = $this->db->select($sql, $id);
        return $result;
    }
}
