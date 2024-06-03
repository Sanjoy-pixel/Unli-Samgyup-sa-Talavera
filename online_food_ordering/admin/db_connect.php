<?php 


$timezone = date_default_timezone_set("Asia/Manila");

$conn= new mysqli('localhost','root','','fos_db')or die("Could not connect to mysql".mysqli_error($con));
