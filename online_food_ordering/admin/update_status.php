<?php
include('db_connect.php');

$id = $_POST['id'];
$save0 = $conn->query("SELECT * FROM orders  where id='$id' ");
$row = $save0->fetch_assoc();
$mobile_number = $row['mobile'];
$sender = "UnliSamgyup";

$delivered_msg = "Your order has been delivered, Thank you for choosing Unli Samgyup sa Talavera. For another Korean barbeque experience don't forget to order again or dine with us at Purok 4, Brgy. Dinarayat, Talavera, Nueva Ecija. Thank you";

                 
                  $ch = curl_init();
                  $parameters = array(
                      'apikey' => '024506ab2f0fb3cc4693c49424a15a13', //Your API KEY
                      'number' => $mobile_number,
                      'message' => $delivered_msg,
                      'sendername' => $sender
                  );
                  curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
                  curl_setopt( $ch, CURLOPT_POST, 1 );
                  
                  //Send the parameters set above with the request
                  curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );
                  
                  // Receive response from server
                  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                  $output = curl_exec( $ch );
                  curl_close ($ch);
                  






$save1 = $conn->query("UPDATE sales_report set status = 2  where userId='$id' ");

$save2 = $conn->query("UPDATE orders set status = 2  where id='$id' ");



?>