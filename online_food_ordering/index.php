<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    include('header.php');
    include('admin/db_connect.php');

	$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach ($query as $key => $value) {
		if(!is_numeric($key))
			$_SESSION['setting_'.$key] = $value;
	}
    ?>

    <style>
    	header.masthead {
		  background: url(assets/img/<?php echo $_SESSION['setting_cover_img'] ?>);
		  background-repeat: no-repeat;
		  background-size: cover;
		}
    </style>
    <body id="page-top">
        <!-- Navigation-->
        <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
      </div>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 " id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="./"><?php echo $_SESSION['setting_name'] ?></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0 ">
                        <li class="nav-item "><a class="nav-link js-scroll-trigger font-color" href="index.php?page=search&product">Search 
</a></li>

                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home">Home</a></li>

                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=contact">Contact</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=about">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=my_order&id=<?php if(isset($_SESSION['login_user_id'])){ echo $_SESSION['login_user_id']; } ?>">My Order </a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=cart_list"><span> <span class="badge badge-danger item_count">0</span> <i class="fa fa-shopping-cart"></i>  </span>Cart</a></li>
                        <?php if(isset($_SESSION['login_user_id'])): ?>
                          
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="admin/ajax.php?action=logout2"><?php echo "Welcome ". $_SESSION['login_first_name'].' '.$_SESSION['login_last_name'] ?> <i class="fa fa-power-off"></i></a></li>
                      <?php else: ?>
                       
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="javascript:void(0)" id="login_now">Login</a></li>
                      <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>   
        <?php 




function  mil_time($median,$hour) {

  if($median == 'PM'){
  
  return   $hour + 12;

  }
   else {
     return $hour;
   }
  

}





 $settings = $conn->query("SELECT * FROM system_settings order by id asc");

 $row = $settings->fetch_assoc();

$o_hour = $row['open_hour'];
$o_minute = $row['open_min'];

$c_hour  = $row['close_hour'];
$c_minute = $row['close_min'];


$open_median = $row['open_median'];
$close_median = $row['close_median'];


$time_open = mil_time($open_median, $o_hour);

$time_close = mil_time($close_median, $c_hour);


 
$o_time = $time_open.":".$o_minute;

$c_time = $time_close .":".$c_minute;





  //  $test = mil_time($m,$c_time);


          

          $opening_time = $o_time;
          $closing_time = $c_time;
          $current_time = date('H:i');

           
          $page = isset($_GET['page']) ?$_GET['page'] : "home";
          include $page.'.php';






          //  if($current_time >= $opening_time ) {
       

          //   $page = isset($_GET['page']) ?$_GET['page'] : "home";
          //   include $page.'.php';

          //  }
          //   else {
              
          //     echo "<script>window.location='admin/closing_time.php'</script>";
           
          //   } 

          //  if ($current_time >= $closing_time ) {

          //   echo "<script>window.location='admin/closing_time.php'</script>";
           
          //  }

          


       




         



          
        //   else if(isset($_SESSION['closing_time'])){
        //     echo "<script>window.location='admin/closing_time.php'</script>";
           
        //    }
         
        //    else {

        //     echo "<script>window.location='admin/closing_time.php'</script>";
        //  }











           

           
             

        ?>
       

<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-righ t"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright © <?php echo date('Y');?> - Online Food Ordering System <a href="#" target="_blank">BSIT</a></div></div>
        </footer>
        
       <?php include('footer.php') ?>
    </body>

    <?php $conn->close() ?>

</html>
