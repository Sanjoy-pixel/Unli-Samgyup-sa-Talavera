<?php

include('admin/db_connect.php');


if(isset($_POST['itemId'])){
  $query = $conn->query("DELETE FROM cart WHERE id='{$_POST['itemId']}'");
  
}


 
     


