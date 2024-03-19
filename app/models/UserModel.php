<?php

class UserModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = ? AND status = 1";
        $result = $this->db->select_one($sql, $email);
        return $result;
    }
    // public function findByPhone($phone)
    // {
    //     $sql = "SELECT * FROM users WHERE phone = ? AND status = 1";
    //     $result = $this->db->select_one($sql, $phone);
    //     return $result;
    // }

    public function register($fullname, $email, $phone, $password)
    {
        $sql = "INSERT INTO users(fullname, email, phone, `password`) VALUES (?, ?, ?, ?)";
        $result = $this->db->execute($sql, $fullname, $email, $phone, $password);
        return $result;
    }
    public function forgotPassword($email, $password, $update_at)
    {
        $sql = "UPDATE users SET password = ?, update_at = ? WHERE email = ?";
        $result = $this->db->execute($sql, $password, $update_at, $email);
        return $result;
    }


    public function findAll()
    {
        $sql = "SELECT * FROM users WHERE status = 1";
        $result = $this->db->select($sql);
        return $result;
    }
    public function findById($id)
    {
        $sql = "SELECT * FROM users WHERE status = 1 AND id = ?";
        $result = $this->db->select_one($sql, $id);
        return $result;
    }

    public function findByProduct_Id($id)
    {
        $sql = "SELECT DISTINCT u.id, u.fullname, u.image FROM users u 
                INNER JOIN reviews r ON u.id = r.user_id 
                INNER JOIN products p ON p.id = r.product_id 
                WHERE p.id = ?";
        $result = $this->db->select($sql, $id);
        return $result;
    }

    public function updateProfile($id, $fullname, $email, $phone, $update_at, $image = null)
    {
        if ($image == null) {
            $sql = "UPDATE users SET fullname = ?, email = ?, phone = ?, update_at = ? WHERE id = ?";
        } else {
            $sql = "UPDATE users SET fullname = ?, email = ?, phone = ?, `image` = ?, update_at = ? WHERE id = ?";
        }
        $result = $this->db->execute($sql, $fullname, $email, $phone, $image, $update_at, $id);
        return $result;
    }
    public function changePassword($id, $password, $update_at)
    {
        $sql = "UPDATE users SET `password` = ?, update_at = ? WHERE id = ?";
        $result = $this->db->execute($sql, $password, $update_at, $id);
        return $result;
    }
}
