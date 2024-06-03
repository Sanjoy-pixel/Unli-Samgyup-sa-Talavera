<?php

include('db_connect.php');

  $n =   $_POST['n'];
  $name = $_POST['un'];
  $password = $_POST['pass'];
  $type = $_POST['ty'];

  $query = $conn->query("INSERT INTO users(name,username, password, type)
  VALUES ('{$n}','{$name}', '{$password}', '{$type}')");


?>