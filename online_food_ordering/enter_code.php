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

      if(isset($_SESSION['email'])){
         $email = $_SESSION['email'];
      }
       else{

        echo "<script> window.location ='index.php?page=forgot'</script>";
       }




         if(isset($_POST['submit'])){


            $code = $_POST['code'];

            $email = $_SESSION['email'];


            $qry = $conn->query("SELECT * FROM codes WHERE code = '$code' && email = '$email' order by id desc limit 1 ");

            //$query = "select * from codes where code = '$code' && email = '$email' order by id desc limit 1" 
           // $result = mysqli_query($con,$query);
            
            if($qry->num_rows > 0){

               $_SESSION['code'] = $code;

            echo "<script> window.location ='index.php?page=change_pass'</script>";
           
        }
             
            else {
               
                $error[] = "Invalid Code";
             
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
            enter the verification code. 

</p>
         
  
            <form class="password-form" method="post" action="">
              
  
            <div>
              
              <input name="code"  required type="text">
              
           
         

            </div>
  
  
             
            <button class="btn btn--form" name="submit" value="SEND">SEND</button>
  
  
            </form>
  
  
        
  
        </div>
  
  
       </div>
  
  </section>
  












