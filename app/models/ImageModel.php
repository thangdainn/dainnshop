<?php

class ImageModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        $sql = "SELECT * FROM reviews WHERE status = 1";
        $result = $this->db->select($sql);
        return $result;
    }

    public function findByProduct_Id($id)
    {
        $sql = "SELECT * FROM images i 
                INNER JOIN products p ON p.id = i.product_id 
                WHERE p.id = ?";
        $result = $this->db->select($sql, $id);
        return $result;
    }
}
