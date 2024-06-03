  <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end mb-4 page-title">
                	<h3 class="text-white">Checkout</h3>
                    <hr class="divider my-4" />

                </div>
                
            </div>
        </div>
    </header>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="" id="checkout-frm">
                    <h4>Confirm Delivery Information</h4>
                    <div class="form-group">
                        <label for="" class="control-label">Firstname</label>
                        <input type="text" name="first_name" required="" class="form-control" value="<?php echo $_SESSION['login_first_name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Lastname</label>
                        <input type="text" name="last_name" required="" class="form-control" value="<?php echo $_SESSION['login_last_name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Contact</label>
                        <input type="text" name="mobile" required="" class="form-control" value="<?php echo $_SESSION['login_mobile'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Address</label>
                        <textarea cols="30" rows="3" name="address" required="" class="form-control"><?php echo $_SESSION['login_address'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Email</label>
                        <input type="email" name="email" required="" class="form-control" value="<?php echo $_SESSION['login_email'] ?>">
                    </div>  
                     <input type="hidden" name="date" value="<?php  $date = date("Y-m-d"); 
                    
                    echo $currentDateTime=date('Y/m/d H:i:s');
                     
                    /*  $newDateTime = date('h:i A', strtotime($currentDateTime));
                    echo $date ." ". $newDateTime; 
  */
                            
                     
                     ?>">
                     <input type="hidden" name="user_id" value="<?php echo $_SESSION['login_user_id'];  ?>">

                    <div class="form-check">
  <input class="form-check-input" type="radio" name="transaction" id="exampleRadios1" value="Cash on delivery" checked>
  <label class="form-check-label" for="exampleRadios1">
    Cash on Delivery <img src="assets/img/cod.png" style="width: 80px; margin-left: 5px;">
  </label>
</div>
<br>
<div class="form-check">
  <input class="form-check-input" type="radio" name="transaction" id="exampleRadios2" value="Gcash">
  <label class="form-check-label" for="exampleRadios2">
    Gcash   <img src="assets/img/gcash.png" style="width: 40px; margin-left: 5px;">
  </label>
</div>
  

                    <br>

                    <div class="text-center">

                                

                        <button class="btn btn-block btn-outline-primary">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function(){
          $('#checkout-frm').submit(function(e){
            e.preventDefault()
          
            start_load()
            $.ajax({
                url:"admin/ajax.php?action=save_order",
                method:'POST',
                data:$(this).serialize(),
                dataType: "json",
                success:function(resp){
                    if(resp.status == 1){
                        alert_toast("Order successfully Placed.")
                        setTimeout(function(){
                            location.replace('index.php?page=home')
                        },1500)
                    }

                    if(resp.status == 2){
                    
                        window.location='gcash.php?order_id='+resp.order_id+'&user_id='+resp.user_id

                    }
  
                }
            })
        })
        })
    </script>