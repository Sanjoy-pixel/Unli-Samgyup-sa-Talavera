
<?php

        include 'admin/db_connect.php';
        include 'admin/total_sales_function.php';
    
        $users = $conn->query("SELECT * FROM system_settings order by id asc");

        $row = $users->fetch_assoc();
     
   ?>








<!-- Masthead-->
 <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                    	 <h1 class="text-uppercase text-white font-weight-bold contact-us">Sign Up</h1>
                        <hr class="divider my-4" />
                    </div>
                    
                </div>
            </div>
        </header>


        <section class="section-cta" id="cta">
     
     <div class="container">
         
              <div class="cta">
  
         <div class="cta-text-box">
  
          <h2 class="heading-secondary">Get your first order Register now!</h2>
          <p class="cta-text">
              Healthy and tasty  meals are waiting for you.  Experience and relish an out of the
             country barbeque just around the corner!
          </p>
  
            <form class="cta-form" id="myForm">
              
            <div>
               <label for="first-name">First Name</label>
              <input id="first-name" name="first-name" required  type="text" placeholder="John">
            </div>
  
            <div>
               <label for="last-name">Last Name</label>
              <input id="last-name" name="last-name" required  type="text" placeholder="Smith">
            </div>
  
            <div>
               <label for="address">Address</label>
              <input id="address" name="address"   required type="text" placeholder="Talavera Nueva Ecija">
            
            </div>
  
            <div>
               <label for="contact">Contact Number</label>
              <input id="contact"  name="contact"  required type="text" placeholder="09061234567">
            </div>
  
  
            <div>
  
              <label for="email">Email Address</label>
              <input id="email"   name="email"  required type="email" placeholder="me@example.com">
              <span class="message-style"></span>
  
            </div>
  
            
            <div>
  
              <label for="password">Password</label>
              <input id="password"  name="password"  required type="password">
  
              <div class=" show-pass-container mbtm"><input type="checkbox" onclick="myFunction()" class="check-box-password" > <span class="show-password">Show Password</span>  </div>
      
          
            </div>
  
  
             
            <button class="btn btn--form" name="submit-btn" value="sign up">Sign up now</button>
  
  
            </form>
  
  
          
        
         </div>
  
         <div class="cta-img-box" role="img" aria-label="Woman enjoy eating food">
         
         </div>
  
        </div>
  
  
       </div>
  
  </section>
  


  <script type="text/javascript">






$(document).ready(function(){

    $("#myForm").on('submit', function(e){
       
     e.preventDefault();

     $.ajax({

         type: "POST",
         url: "sign_up.php",
         data: new FormData(this),
         dataType: "json",
         contentType: false,
         cache: false,
         processData: false,
         success:function(response){
           $(".message-style").css("display","block");
           if(response.status == 1) {
            $("#myForm")[0].reset();
           
            uni_modal('','email_verify.php?email='+response.session+'');

           
          }
           else {

          
            
            $(".message-style").css("display","block");
            $(".message-style").html('<span>' + response.message + '</span>');

           }

         }

     });






    });

});



  
    </script>
	




    