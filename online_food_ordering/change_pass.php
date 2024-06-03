 <!-- Masthead-->
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
 
      if(isset($_SESSION['code'])){
         $code = $_SESSION['code'];
         $email = $_SESSION['email'];
         
      }
       else{

        echo "<script> window.location ='index.php?page=enter_code'</script>";
       }




         if(isset($_POST['submit'])){

                $password = $_POST['password'];
                $password2 = $_POST['password2'];


               if ($password == $password2){

                $password = md5($password);

               $query = $conn->query("UPDATE user_info set password ='$password' WHERE email = '$email' limit 1 ");
            //$query = "update users set password = '".md5($password)."' where email = '$email' limit 1";
		           
               unset($_SESSION['email']);
               unset($_SESSION['code']);


                  echo "<script> window.location ='index.php?page=notif'</script>";
                     
               }

               else

                    {

                  $error[] = "Passwords do not match";
               
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


         
  
            <form class="password-form" method="post" action="">
              
            
            <div>
               <label for="password">Enter your new password</label>
              <input id="password" name="password"   required type="password" >
            
            </div>
  

            <div>
               <label for="password2">Retype your new password</label>
              <input id="password2" name="password2"   required type="password" >
            
            </div>
  
            <div class=" show-pass-container"><input type="checkbox" onclick="myFunction()" class="check-box-password" > <span class="show-password">Show Password</span>  </div>
  
             
            <button class="btn btn--form margin-t" name="submit" value="SEND">SEND</button>
  
  
            </form>
  
  
        
  
        </div>
  
  
       </div>
  
  </section>


















<script>
      function myFunction() {
  var x = document.getElementById("password");
  var z = document.getElementById("password2");


  if (x.type === "password" && z.type === "password") {
    x.type = "text";
    z.type = "text";
  } else {
    x.type = "password";
    z.type = "password";
  }
}


</script>