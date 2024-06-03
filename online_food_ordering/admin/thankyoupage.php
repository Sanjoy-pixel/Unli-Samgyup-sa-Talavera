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

             <p>Order Successfully Placed!</p> 
			
             <p>Thank you. 🐷</p>
	         <p class="color-white"><a href="https://unlisamgyupsatalavera.online/">Back to HomePage &rarr;</a></p>
			
			 
<?php if(isset($_GET['order_id'])){
	echo $_GET['order_id'];
	echo "<h1>hello</h1>";
}

?>



		</div>
  					
  				
  		</div>
   

  </main>




</body>

</html>