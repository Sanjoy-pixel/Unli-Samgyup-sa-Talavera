
<!-- <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                    	 <h1 class="text-uppercase text-white font-weight-bold"></h1>
                        <hr class="divider my-4" />
                    </div>
                    
                </div>
            </div>
        </header> -->
        <?php if(isset($_GET['email'])){
  
  $email = $_GET['email'];

  

}
 
?>




        <section class="section-email" id="email-modal-section">
     
     <div class="container-email">
         
              <div class="email">
  
         <div class="email-text-box">
             <p class="form-message"></p>               

          <p class="email-description"> We sent a verification code, Please
            enter the code to verify your email. 

</p>
         
  
            <form class="email-form" id="email-modal">
              
  
            <div>
              
              <input id="modal-code"  name="code"  required type="text">
              <input   name="email"   type="hidden" value="<?php echo $email ?>">

            </div>
  
  
             
            <button class="btn btn--form" name="submit-btn" value="sign up">SEND</button>
  
  
            </form>
  
  
        
  
        </div>
  
  
       </div>
  
  </section>
  

<style>

.modal-footer, .modal-header {
  display: none;
}

</style>





  <script type="text/javascript">


$(document).ready(function(){

    $("#email-modal").on('submit', function(e){
       
     e.preventDefault();

     $.ajax({

         type: "POST",
         url: "email_modal_verify.php",
         data: new FormData(this),
         dataType: "json",
         contentType: false,
         cache: false,
         processData: false,
         success:function(response){
           
           if(response.status == 1) {
                  
             $(".form-message").css("display","block");
            $(".form-message").css("color","green");

            $(".form-message").html('<span>' + response.message + '</span>');
           
              console.log(response);     
           
          }
           else {
            $(".form-message").css("display","block");
            $(".form-message").css("color","#ee3e0d");
            $(".form-message").html('<p>' + response.message + '</p>');

           }

         }

     });






    });

});



        
       
   
   </script>
	
