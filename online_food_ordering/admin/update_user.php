<?php

include('db_connect.php');
  $id =  $_POST['i'];
  $n =   $_POST['n'];
  $name = $_POST['un'];
  $password = $_POST['pass'];
  $type = $_POST['ty'];

  $query = $conn->query("UPDATE users set name ='{$n}', username='{$name}', password ='{$password}', type = '{$type}' WHERE id='{$id}'");



?>