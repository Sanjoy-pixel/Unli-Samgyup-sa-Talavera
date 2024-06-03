<?php
include 'admin/db_connect.php';


$response = array(
   'status' => 0,
   'message' => '',

);




if ( isset($_POST['first-name']) || isset($_POST['last-name']) || isset($_POST['address']) || isset($_POST['contact']) || isset($_POST['email']) || isset($_POST['password'])) {
   
   $first_name = $_POST['first-name'];
   $last_name = $_POST['last-name'];
   $address = $_POST['address'];
   $contact = $_POST['contact'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $subject = "Email Verification Code";
   $code = rand(10000,99999);
 


   $qry = $conn->query("SELECT * FROM user_info where email = '$email' ");

    if($qry->num_rows == 1) {

      $response['message'] = "Sorry email already exists";
    }
      else {
          
       
 
         $hash = md5($password);

         $query = $conn->query("INSERT INTO user_info(first_name, last_name, email, password, mobile, address)
         
         VALUES ('{$first_name}','{$last_name}', '{$email}', '{$hash }', '{$contact }','{$address}')");

          $query = $conn->query("INSERT INTO codes(email,code)

          VALUES ('{$email}','{$code}')");

          


$url = "https://script.google.com/macros/s/AKfycbzgUNPtVIXl0FSK-uTFy_HMbbdKROFV8q2cQVnBtmBnuMO9kw1m3NPBi5uwn9YD-dcZSA/exec";
               $ch = curl_init($url);
               curl_setopt_array($ch, [
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_POSTFIELDS => http_build_query([
                     "recipient" => $email,
                     "subject"   => $subject,
                     "body"      => "Your Verification code is"." ". $code
                  ])
               ]);
               $result = curl_exec($ch);

         $response['status'] = 1;


        $response['session'] = $_SESSION['email'] = $email;

      


      }

    

}


echo json_encode($response);






?>