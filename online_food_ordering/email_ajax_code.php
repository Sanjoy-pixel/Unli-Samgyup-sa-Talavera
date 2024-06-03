<?php



include 'admin/db_connect.php';


$response = array(
   'status' => 0,
   'message' => '',
   'session' => ''
);


if(isset($_POST['email_code']) ){
   
    
     $email = $_POST['email_code'];
     $code = rand(10000,99999);
     $subject = "Email verification code";
  

   
   
     $qry = $conn->query("SELECT * FROM user_info WHERE email = '$email' ");

     
     if($qry->num_rows > 0){

    
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
        $response['message'] = "Please enter the verification code.";
        $response['email'] = $email;
        $save_email =  $response['email']; 

        $query = $conn->query("INSERT INTO codes(email,code)

        VALUES ('{$email}','{$code}')");

        $response['session'] = $email;

      // $verified = $conn->query("UPDATE user_info set verified = 1  where email = '$email' ");

 
    } else {
     
      $response['message'] = "Email not exists";
    }
 
    


}
  
   


echo json_encode($response);

























