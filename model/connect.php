<?php
function connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=shoping", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    return $conn; // Trả về kết nối
}

function get_all($sql)
{
    $conn = connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $arrproduct = $stmt->fetchAll();
    $conn = null;
    return $arrproduct;
}

function get_one($sql)
{
    $conn = connect(); // Kết nối đến cơ sở dữ liệu
    $stmt = $conn->prepare($sql); // Chuẩn bị câu lệnh truy vấn SQL
    $stmt->execute(); // Thực thi truy vấn
    $stmt->setFetchMode(PDO::FETCH_ASSOC); // Đặt chế độ trả về kết quả
    $data = $stmt->fetch(); // Lấy một dòng dữ liệu
    $conn = null; // Đóng kết nối đến cơ sở dữ liệu
    return $data; // Trả về dữ liệu
}