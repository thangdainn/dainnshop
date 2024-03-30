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
        $sql = '';
        if ($orderStatusId == 0) {
            $sql = "SELECT * FROM `order` WHERE user_id = ?";
            $result = $this->db->select($sql, $userId);
        }
        else {
            $sql = "SELECT * FROM `order` WHERE user_id = ? AND id_order_status = ?";
            $result = $this->db->select($sql, $userId , $orderStatusId);
        }
        return $result;
    }

    public function viewDetailByOrderId($orderId) {
        $sql = "SELECT p.name as product_name, p.img as product_image , s.name as size , od.quantity as quantity , od.total as total
        FROM `order_detail` od, `products` p, `sizes` s 
        WHERE od.product_id = p.id and od.size_id = s.id and od.order_id = ?";
        $result = $this->db->select($sql, $orderId); 
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
