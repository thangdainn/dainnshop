<?php

class PurchaseOrderModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        $sql = "SELECT * FROM `order`";
        $result = $this->db->select($sql);
        return $result;
    }

    public function findByUserId($id)
    {
        $sql = "SELECT * FROM `order` WHERE user_id = ?";
        $result = $this->db->select($sql, $id);
        return $result;
    }

    public function findByOrderStatusId($userId, $orderStatusId)
    {
        $sql = "SELECT * FROM `order` WHERE user_id = ?";
    $params = array($userId);
    
    // Kiểm tra xem $orderStatusId có được định nghĩa và không rỗng
    if ($orderStatusId !== null && $orderStatusId !== '') {
        $sql .= " AND id_order_status IN ($orderStatusId)";
    }
    
    $result = $this->db->select($sql, $params);
    return $result;
    }

    public function save($data)
    {
        $sql = "INSERT INTO order(name, image) VALUES (?,?)";
        $this->db->execute($sql, $data['name'], $data['image']);
        // return $result;
    }
    public function update($data)
    {
        $sql = "UPDATE order SET name=?,image=?,update_at=? WHERE id=?";
        $this->db->execute($sql, $data['name'], $data['image'], $data['update_at'], $data['id']);
    }
}