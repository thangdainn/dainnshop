<?php

function getConnection()
{
    $url = "mysql:host=localhost;dbname=do_an_web";
    $username = "root";
    $password = "";
    $conn = new PDO($url, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

function execute($sql){
    $sql_args = array_slice(func_get_args(),1);
    try {
        $conn = getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $th) {
        throw $th;
    } finally {
        unset($conn);
    }
}

function query($sql){
    $sql_args = array_slice(func_get_args(),1);
    try {
        $conn = getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $th) {
        throw $th;
    } finally {
        unset($conn);
    }
}

function query_one($sql){
    $sql_args = array_slice(func_get_args(),1);
    try {
        $conn = getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $th) {
        throw $th;
    } finally {
        unset($conn);
    }
}

function query_value($sql){
    $sql_args = array_slice(func_get_args(),1);
    try {
        $conn = getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row[0]);
    } catch (PDOException $th) {
        throw $th;
    } finally {
        unset($conn);
    }
}