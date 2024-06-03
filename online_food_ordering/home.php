 <!-- Masthead-->
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4 page-title">
                    	<h3 class="text-white font-size-weight">Welcome to <?php echo $_SESSION['setting_name']; ?></h3>
                        <hr class="divider my-4" />
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#meals">Order Now</a>

                    </div>
                    
                </div>
            </div>
        </header>


  <!-- Hero Section -->


        <section class="section-hero">
      <div class="hero">

<div class="hero-text-box">   


     <h1 class="heading-primary">Ready to experience and relish an out of the country barbeque just around the corner.</h1>
    <p class="hero-description">
    With Samgyup sa Talavera, You will find an exclusive palate that will satisfy your cravings for Korean barbeque, with your family, your friends, your couple or even solo. Aside from casual diner you can also experience the authentic
    taste of Korean barbeque on your homes through take outs and deliveries. 
  </p> 

  <a href="#cta" class="btns btn--full margin-right-sm ">
    Start eating well
  </a>

  <a href="index.php?page=faq" class="btns btn--outline">
      Learn more &darr;
  </a>

 


</div>

<div class="hero-img-box">
 <img src="assets/img/herocombine.png" class="hero-img" alt="woman enjoying eat food"/>

</div>

</div>

    </section>




<!-- Meals Section -->

<section class="section-meals" id="meals">

<div class="container-omni center-text">
    <span class="subheading">Meals</span>
   
    <h2 class="heading-secondary">
    Try 0ur Mouth-Watering and Authentic Korean BBQ and More!
   </h2>

  </div>


  <div class="container-omni grid grid--4--cols margin-bottom-md">
     
              <?php 
                    include'admin/db_connect.php';
                    $qry = $conn->query("SELECT * FROM  product_list order by rand() ");
                    while($row = $qry->fetch_assoc()):
                    ?>


 <div class="meals">
         
      <img src="assets/img/<?php echo $row['img_path'] ?>" class="meal-img" alt="Japanes Gyoza"/>
         
        <div class="meal-content">

        <p class="meal-title"><?php echo $row['name'] ?></p>

            <ul class="meal-attributes">
              
                 <li class="meal-attribute"><span><strong>&#8369;</strong><?php echo number_format($row['price'],2)?></span></li>

                 <li class="meal-attribute"><button class="btn btn-sm btn-outline-primary view_prod btn-block" data-id="<?php echo $row['id'] ?>"><svg class="svg-inline--fa fa-eye fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"></path></svg><!-- <i class="fa fa-eye"></i> --> View</button></li>

            </ul>
       
      </div>

     </div>
    
     <?php endwhile; ?>





                </div>


            </section>




<!-- Testimonials -->



            <section class="section-testimonials">
    
    <div class="testimonial-container">
  
      <!-- <span class="subheading">Testimonials</span> -->
     
      <h2 class="heading-secondary">
      Once you try it, you can't go back
     </h2>
  
      
   <div class="testimonials" id="testimonials">
          
      <figure class="testimonial">
  
        <img src="assets/img/Aira-Bondoc.jpg" class="testimonial-img" alt="Photo of Customer Dave Bryson"/>
            
          <blockquote class="testimonial-text">
          The best na kinakainan namin na Unli Samgyup sa Talavera Hindi ka maghihintay ng matagal
          pag kaupo mo iseserve nila sayo lahat at mababait pa ang mga staff 😍
          </blockquote>
  
          <p class="testimonial-name">
            &mdash; Aira Bondoc
           </p>
        </figure>
  
  
        <figure class="testimonial">
  
          <img src="assets/img/Jen-Tolentino.jpg" class="testimonial-img" alt="Photo of Customer Ben Hadley"/>
                
              <blockquote class="testimonial-text">
              Count the MEMORIES not the CALORIES  Dito na kayo guys sulit 😁😅.
              </blockquote>
      
              <p class="testimonial-name">
                &mdash; Jen Tolentino
               </p>
            </figure>
  
  
  
  
  
  
  
  
        <figure class="testimonial">
  
          <img src="assets/img/Angelika-Dinong.jpg" class="testimonial-img" alt="Photo of Customer Steve Miller"/>
                
              <blockquote class="testimonial-text">
               Masasarap  yung mga food nila❤️. Sa uulitin po uli😁. Highly  recommended sa mga nag hahanap dyan ng Unli samgy sulit bayad nyo 
              </blockquote>
      
              <p class="testimonial-name">
                &mdash; Angelika Dinong
               </p>
            </figure>
              
            
            <figure class="testimonial">
  
              <img src="assets/img/Paulyn-Manalaysay.jpg" class="testimonial-img" alt="Photo of Customer Hannah Smith"/>
                    
                  <blockquote class="testimonial-text">
                  Pagka tinanong ulit kami sa class kung ano ang very hospitable na 
                  nakainan namin. ito talaga ang irerecommend ko. 100/5 stars 🤩🤩
                  </blockquote>
          
                  <p class="testimonial-name">
                    &mdash; Paulyn Manalaysay
                   </p>
                </figure>
  
  
               
  
      </div>
  
  </div>
  
  <div class="gallery">
  
         <figure class="gallery-item">
  
              <img src="assets/img/gallery-1.jpg" alt="Photo beautifully arranged food"/>
  
          </figure>
      
  
           
           <figure class="gallery-item">
  
            <img src="assets/img/gallery-2.jpg" alt="Photo beautifully arranged food"/>
  
         </figure>
  
  
         <figure class="gallery-item">
  
          <img src="assets/img/gallery-3.jpg" alt="Photo beautifully arranged food"/>
  
       </figure>
  
  
       <figure class="gallery-item">
  
        <img src="assets/img/gallery-4.jpg" alt="Photo beautifully arranged food"/>
  
     </figure>
  
  
     <figure class="gallery-item">
  
      <img src="assets/img/gallery-5.jpg" alt="Photo beautifully arranged food"/>
  
   </figure>
  
  
  
   <figure class="gallery-item">
  
    <img src="assets/img/gallery-6.jpg" alt="Photo beautifully arranged food"/>
  
  </figure>
  
  
  <figure class="gallery-item">
  
    <img src="assets/img/gallery-7.jpg" alt="Photo beautifully arranged food"/>
  
  </figure>
  
  
  
  <figure class="gallery-item">
  
    <img src="assets/img/gallery-8.jpg" alt="Photo beautifully arranged food"/>
  
  </figure>
  
  
  <figure class="gallery-item">
  
    <img src="assets/img/gallery-9.jpg" alt="Photo beautifully arranged food"/>
  
  </figure>
  
  
  <figure class="gallery-item">
  
    <img src="assets/img/gallery-10.jpg" alt="Photo beautifully arranged food"/>
  
  </figure>
  
  
  <figure class="gallery-item">
  
    <img src="assets/img/gallery-11.jpg" alt="Photo beautifully arranged food"/>
  
  </figure>
  
  
  
  <figure class="gallery-item">
  
    <img src="assets/img/gallery-12.jpg" alt="Photo beautifully arranged food"/>
  
  </figure>
      
      
  </div>
  
  
  </section>



<!-- Section CTA -->


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



function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
	element.classList.add("form-control");
  } else {
    x.type = "password";
  }
}




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



        
        $('.view_prod').click(function(){
            uni_modal_right('Product','view_prod.php?id='+$(this).attr('data-id'));
        })
    </script>
	
