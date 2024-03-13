<?php

class LoginModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findByEmail($email){
        $sql = "SELECT * FROM users WHERE email = ? AND status = 1";
        $result = $this->db->select_one($sql, $email);
        return $result;
    }

    public function save($fullname, $email, $password){
        $sql = "INSERT INTO users(fullname, email, `password`) VALUES (?, ?, ?)";
        $result = $this->db->execute($sql, $fullname, $email, $password);
        return $result;
    }
}

