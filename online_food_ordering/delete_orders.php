<?php
include 'admin/db_connect.php';

$date = $_POST['d'];
$orderList = $_POST['ol'];
$orderId = $_POST['oi'];
$message = $_POST['m'];



$qry2 = $conn->query("SELECT * FROM orders WHERE userId = '$orderId' ");

$row = $qry2->fetch_assoc();
$name = $row['name'];
$address = $row['address'];
$mobile = $row['mobile'];
$status = $row['status'];



$query = $conn->query("INSERT INTO cancel_orders(name,address, mobile, date,reason,user_id)
VALUES ('{$name}','{$address}', '{$mobile}', '{$date}','{$message}','{$orderList}')");


 $query = $conn->query("DELETE FROM orders WHERE id='$orderList'");

if($status = 1){

    $save2 = $conn->query("DELETE FROM sales_report WHERE userId='$orderList'");
    $save3 = $conn->query("DELETE FROM total_sales WHERE userId='$orderList'");
}


 


?>