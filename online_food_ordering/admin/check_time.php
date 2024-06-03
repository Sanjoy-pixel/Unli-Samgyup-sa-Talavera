<?php


session_start();

include 'db_connect.php'; 


$settings = $conn->query("SELECT * FROM system_settings order by id asc");

$row = $settings->fetch_assoc();


if(isset($_SESSION['login_user_time'])){

    $difference =  time()  - $_SESSION['login_user_time'];


$min = $row['min_admin'];

$minutes = $min * 60;


     if($difference > $minutes)  {
        echo "Logout";
      
     }  

}



?>