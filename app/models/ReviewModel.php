<?php

class ReviewModel extends Model
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

    public function addReview($productId, $userId, $name, $email, $message, $star) {
        $sql = "INSERT INTO `reviews` (`product_id`, `user_id`, `name`, `email`, `message`, `star`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $result = $this->db->execute($sql, $productId, $userId, $name, $email, $message, $star, 1);
        return $result;
    }

    public function findByProduct_Id($id)
    {
        $sql = "SELECT * FROM reviews r 
                INNER JOIN products p ON p.id = r.product_id 
                WHERE r.status > 0
                    AND p.id = ?";
        $result = $this->db->select($sql, $id);
        return $result;
    }
}
