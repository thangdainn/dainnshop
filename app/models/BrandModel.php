<?php

class BrandModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        $sql = "SELECT * FROM brands WHERE status = 1";
        $result = $this->db->select($sql);
        return $result;
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM brands WHERE id = ? AND status = 1";
        $result = $this->db->select($sql, $id);
        return $result;
    }
    public function save($data)
    {
        $sql = "INSERT INTO brands(name, image) VALUES (?,?)";
        $this->db->execute($sql, $data['name'], $data['image']);
        // return $result;
    }
    public function update($data)
    {
        $sql = "UPDATE brands SET name=?,image=?,update_at=? WHERE id=?";
        $this->db->execute($sql, $data['name'], $data['image'], $data['update_at'], $data['id']);
    }
}
