<?php

class Database extends PDO
{

    public function __construct($conn, $username, $password)
    {
        parent::__construct($conn, $username, $password);
    }

    public function select($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $stmt = $this->prepare($sql);
            $this->setParameter($stmt, $sql_args);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function select_one($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $stmt = $this->prepare($sql);
            $this->setParameter($stmt, $sql_args);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function execute($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $stmt = $this->prepare($sql);
            $this->setParameter($stmt, $sql_args);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function count($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $stmt = $this->prepare($sql);
            $this->setParameter($stmt, $sql_args);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function setParameter($stmt, array $data)
    {
        try {
            foreach ($data as $key => $value) {
                $stmt->bindValue($key + 1, $value);
            }
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
}
