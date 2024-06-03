<?php


include 'admin/db_connect.php';


$response = array(
   'status' => 0,
   'message' => ''
    
);


if(isset($_POST['code']) || isset($_POST['email']) ){
   
    $code = $_POST['code'];
    $email = $_POST['email'];


     $qry = $conn->query("SELECT * FROM codes WHERE code = '$code' && email = '$email' order by id desc limit 1 ");

     if($qry->num_rows > 0){

      $verified = $conn->query("UPDATE user_info set verified = 1  where email = '$email' ");
       $response['status'] = 1;
       $response['message'] = "Your email has been verified try to login your account.";

    }
 
       else {
        
        $response['message'] = "Invalid verification code";
      
    }


 


}


echo json_encode($response);





?>