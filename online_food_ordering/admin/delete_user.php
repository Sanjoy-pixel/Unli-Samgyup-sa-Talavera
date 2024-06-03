<?php

include('db_connect.php');

    $id = $_POST['i'];

    $query = $conn->query("DELETE FROM users WHERE id='{$id}'");

 


  
  


