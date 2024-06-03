 <style>

 

 </style>
 
 
 <!-- Masthead-->
 <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                    	 <h1 class="text-uppercase text-white font-weight-bold"></h1>
                         <div class="main">

          <?php
            
            if (isset($_GET['product'])){
                $product =  urldecode($_GET['product']);

            }
             else {
               $product = "";
             }
            
            
            ?>

  
  <!-- Actual search box -->
  <div class="form-group has-search">
    <input type="text"  class="form-control searchInput" value="<?php echo $product?>"  placeholder="Search Menu Here..."  >
  </div>
  
  <!-- Another variation with a button -->
 
  
  
</div>
                         
                        <hr class="divider my-4" />
                    </div>
                    
                </div>
            </div>
        </header>

    

        <section class="section-meals" id="meals">



  <div class="container-omni grid grid--4--cols margin-bottom-md">
     
              <?php 
                    include'admin/db_connect.php';
                    $qry = $conn->query("SELECT * FROM  product_list WHERE name LIKE '$product%' ");

                    if($qry->num_rows == 0){

                      echo '<div class="alert alert-primary" role="alert" style="width: 100%;"> <h1 style="text-align: center;"> No Results Found!</h1>
 
                  </div>';
                    }

                    while($row = $qry->fetch_assoc()):
                    ?>

 <div class="meals">
         
      <img src="assets/img/<?php echo $row['img_path'] ?>" class="meal-img" alt="Japanes Gyoza"/>
         
        <div class="meal-content">

        <p class="meal-title"><?php echo $row['name'] ?></p>

            <ul class="meal-attributes">
              
                 <li class="meal-attribute"><span><strong>&#8369;</strong><?php echo  $row['price'] ?>.00</span></li>

                 <li class="meal-attribute"><button class="btn btn-sm btn-outline-primary view_prod btn-block" data-id="<?php echo $row['id'] ?>"><svg class="svg-inline--fa fa-eye fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"></path></svg><!-- <i class="fa fa-eye"></i> --> View</button></li>

            </ul>
       
      </div>

     </div>
    
     <?php endwhile; ?>





                </div>


            </section>








        <script>

       $('.view_prod').click(function(){
            uni_modal_right('Product','view_prod.php?id='+$(this).attr('data-id'))
        })





    $(".searchInput").focus()

    document.addEventListener('mouseover', function (e) {
  if (e.target.localName ==='input'){
    e.target.focus();
    var val = e.target.value; //store the value of the element
    e.target.value = '';      //clear the value of the element
    e.target.value = val;     //set that value back. 
  }
});

document.addEventListener('mouseout', function (e) {
  e.target.blur();
});




         $( function(){
          var timer;
            
          $(".searchInput").keyup(function(){
            clearTimeout(timer);
            timer = setTimeout( function(){
              var val = $(".searchInput").val();
              window.location="index.php?page=search&product="+ val;
             
            }, 2000)
          })

         })


        </script>