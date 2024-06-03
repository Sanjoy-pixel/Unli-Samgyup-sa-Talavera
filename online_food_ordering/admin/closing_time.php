<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin | Online Food Ordering System</title>
 	

<?php include('./header.php'); ?>

</head>
<style>


</style>

<body>

<?php
include 'db_connect.php'; 


$settings = $conn->query("SELECT * FROM system_settings order by id asc");

$row = $settings->fetch_assoc();



$opening_time = $row['open_hour'] .":".$row['open_min']." ".$row['open_median'];
$closing_time = $row['close_hour'] .":".$row['close_min']." ".$row['close_median'];


?>




  <main class="main">
  		<div class="login-left">
  			<!-- <div class="logo">
  				<img src="../assets/img/sample_logo.png" class="image" alt=""   >
  			</div> -->
  		</div>
  		<div class="login-right">
  			   <div class="con-heading">
            <!-- <h1 class="close-heading">Sorry! We're currently closed Please come back tomorrow </h1>
			<h1 class="close-heading">Our store opens at <span class="time"> 11:30 AM</span> until <span class="time">9:30 PM </span>  </h1>
			<h1 class="close-heading"> from  <span class="time-days">Monday to Saturday</span></h1>
			<h1 class="close-heading"> Thank you. 🐷</h1> -->

             <p>Sorry! We're currently closed </p> 
			 <p>Please come back tomorrow</p>
			 <p>Our store opens at </p>
			 <p class="color-white"><?php echo $opening_time; ?> until <?php echo $closing_time; ?></p>
			 <p class="color-white">from Monday to Sunday</p>
			 <p>Thank you. 🐷</p>


		</div>
  					
  				
  		</div>
   

  </main>




</body>

</html>