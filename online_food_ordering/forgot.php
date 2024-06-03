<header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                    	 <h1 class="text-uppercase text-white font-weight-bold"></h1>
                        <hr class="divider my-4" />
                    </div>
                    
                </div>
            </div>
        </header>

       
       <?php 

include 'admin/db_connect.php';

$error = array();

?>

<?php
        
        
        if(isset($_POST['submit'])){

            $email = $_POST['email'];

            $code = $vcode = rand(10000,99999);

            $subject = "Verification Code";

            $query = $conn->query("INSERT INTO codes(email,code)

            VALUES ('{$email}','{$code}')");

          /*  $query = "insert into codes (email,code) value ('$email','$code')";
		     mysqli_query($con,$query);
 */
          $qry = $conn->query("SELECT * FROM user_info WHERE email = '$email' limit 1 ");

            /* $query = "select * from users where email = '$email' limit 1";
            $result = mysqli_query($con,$query); */

            if($qry->num_rows > 0){
               $url = "https://script.google.com/macros/s/AKfycbzgUNPtVIXl0FSK-uTFy_HMbbdKROFV8q2cQVnBtmBnuMO9kw1m3NPBi5uwn9YD-dcZSA/exec";
               $ch = curl_init($url);
               curl_setopt_array($ch, [
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_POSTFIELDS => http_build_query([
                     "recipient" => $email ,
                     "subject"   => $subject,
                     "body"      => "Your Verification code is"." ". $code
                  ])
               ]);
               $result = curl_exec($ch);
               //echo $result;

               $_SESSION['email'] = $email;
              
               
              echo "<script> window.location ='index.php?page=enter_code'</script>";
              // header("Location: index.php?page=enter_code");
            }
            else if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
               
               $error[] = "Please enter a valid email";

         }

            else{
              $error[] = "That email was not found";
               
            } 
           
            
         }
         ?>



        
        <section class="section-password" >
     
     <div class="container-password">
         
              <div class="password">
  
         <div class="password-text-box">
             <p class="form-password-message"> <?php 

       foreach ($error as $err) {

        echo $err;

        } 
?></p>               

          <p class="password-description">Please
            enter your registered email to get a verification code. 

</p>
         
  
            <form class="password-form" method="post" action="">
              
  
            <div>
              
              <input name="email"  required type="email">
              
           
         

            </div>
  
  
             
            <button class="btn btn--form" name="submit" value="SEND">SEND</button>
  
  
            </form>
  
  
        
  
        </div>
  
  
       </div>
  
  </section>
  







