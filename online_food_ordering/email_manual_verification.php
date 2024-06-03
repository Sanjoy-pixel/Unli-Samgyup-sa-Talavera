
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




        <section class="section-email" id="email-section-verify">
     
     <div class="container-email">
         
              <div class="email">
  
         <div class="email-text-box">
             <p class="form-message"></p>               

          <p class="email-description">Please
            enter your registered email to get a verification code. 

</p>
         
  
            <form class="email-form" id="email-verify">
              
  
            <div>
              
              <input id="email-code"  name="email_code"  required type="text">
              <input   name="code"   type="hidden">
              
              
              

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

    $("#email-verify").on('submit', function(e){
       
     e.preventDefault();

     $.ajax({

         type: "POST",
         url: "email_ajax_code.php",
         data: new FormData(this),
         dataType: "json",
         contentType: false,
         cache: false,
         processData: false,
         success:function(response){
           
          console.log(response);

           if(response.status == 1) {
            
           
             uni_modal('','email_modal_code.php?email='+response.session+'');
              
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
	
