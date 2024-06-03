
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
                    	 <h1 class="text-uppercase text-white font-weight-bold contact-us">Contact Us</h1>
                        <hr class="divider my-4" />
                    </div>
                    
                </div>
            </div>
        </header>


        <section class="section-contact" id="cta">
     
     <div class="container">
         
              <div class="contact">
  
         <div class="contact-text-box">
  
          <h2 class="heading-secondary">Get in touch
              <?php
             
           
// PHP program to convert number to month name
  
// Declare month number and initialize it







              
              ?>

          </h2>
          <p class="contact-text">
          Your opinions are important to us. Whether it is a <strong class="contact-quote">simple question</strong>  or a <strong class="contact-quote">valuable suggestion.</strong>
          </p>

          <p class="contact-info">
          <span><svg xmlns="http://www.w3.org/2000/svg" class="phone-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
         <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
       </svg> <strong class="contact-quote"> <?php echo $row['contact']?> (Globe) </strong> </span>

   <span>  <svg xmlns="http://www.w3.org/2000/svg" class="mail-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
</svg> <strong class="contact-quote"><?php echo $row['email']; ?> </strong> </span> 



          </p>             
                      
            <form class="contact-form" id="contactForm">
              
           
  
            <div>
               <label for="fullname">Full Name</label>
              <input id="fullname" name="name"   required type="text" placeholder="John Smith">
            
            </div>
  
        
  
            <div>
  
              <label for="email">Email Address</label>
              <input id="email"   name="email"  required type="email" placeholder="me@example.com">
           
  
            </div>
  
            
            <div>
  
              <label for="message">Message</label>
              <input id="message"  name="message"  required type="text">
          
            </div>
  
  
             
            <button class="btn btn--form" name="submit-btn" value="sign up">SEND</button>
  
  
            </form>
  
  
          
        
         </div>
  
         <div class="contact-img-box" role="img" aria-label="Woman enjoy eating food">
         
         </div>
  
        </div>
  
  
       </div>
  
  </section>








       
        <script>
    $(document).ready(function(){
          $('#contactForm').submit(function(e){
            e.preventDefault()
          
            $.ajax({
                url:"https://api.apispreadsheets.com/data/0GvmH82L7yaq2Z8t/",
                method:'POST',
                data:$(this).serialize(),
                success:function(){
                    alert("Email Sent!")
                    window.location="index.php?page=contact";
                }
            })
        })
        })
    </script>