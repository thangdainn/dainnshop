<?php

class PurchaseOrderModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        $sql = "SELECT * FROM `order` ORDER BY create_at DESC";
        $result = $this->db->select($sql);
        return $result;
    }

    public function findByUserId($id)
    {
        $sql = "SELECT * FROM `order` WHERE user_id = ? ORDER BY create_at DESC";
        $result = $this->db->select($sql, $id);
        return $result;
    }

    public function findByOrderStatusId($userId, $orderStatusId)
    {
        $sql = '';
        if ($orderStatusId == 0) {
            $sql = "SELECT * FROM `order` WHERE user_id = ? ORDER BY create_at DESC";
            $result = $this->db->select($sql, $userId);
        } else {
            $sql = "SELECT * FROM `order` WHERE user_id = ? AND id_order_status = ? ORDER BY create_at DESC";
            $result = $this->db->select($sql, $userId, $orderStatusId);
        }
        return $result;
    }

    public function viewDetailByOrderId($orderId)
    {
        $sql = "SELECT p.id as product_id, p.name as product_name, p.img as product_image , s.name as size , od.quantity as quantity , od.total as total, od.isReviewed as is_reviewed
        FROM `order_detail` od, `products` p, `sizes` s 
        WHERE od.product_id = p.id and od.size_id = s.id and od.order_id = ?";
        $result = $this->db->select($sql, $orderId);
        return $result;
    }

    public function isReviewed($orderId, $productId)
    {
        $sql = "UPDATE `order_detail` SET `isReviewed` = 1 WHERE `order_id` = ? AND `product_id` = ?";
        $result = $this->db->execute($sql, $orderId, $productId);
        return $result;
    }

    public function cancelOrder($orderId)
    {
        $sql = "UPDATE `order` SET id_order_status = 4 WHERE id = ?";
        $result = $this->db->execute($sql, $orderId);
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
