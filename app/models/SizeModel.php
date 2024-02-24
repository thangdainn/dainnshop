<?php

class SizeModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        $sql = "SELECT * FROM sizes";
        $result = $this->db->select($sql);
        return $result;
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM sizes WHERE id = ?";
        $result = $this->db->select($sql, $id);
        return $result;
    }
}
