
<div class="container-fluid">
	<div class="card">
		<div class="card-body">





		<div class="form-group has-search">
   
  </div>
   <?php 
     include 'db_connect.php'; 


      if(!isset($_SESSION['date'])){
		$currentDateTime=date('Y-m-d');
	  }
	    else{
           

		   $currentDateTime = date('Y-m-d',strtotime( $_SESSION['date']));
		

		}


	

	 $qry = $conn->query("SELECT SUM(gcash) AS 'sum_gcash' FROM total_sales WHERE date = '$currentDateTime'"); 
        
	 $row = $qry->fetch_assoc();

	 $gcash = $row['sum_gcash'];

	 
	 $qry1 = $conn->query("SELECT SUM(cod) AS 'sum_cod' FROM total_sales WHERE date = '$currentDateTime'"); 
        
     $row = $qry1->fetch_assoc();

      $cod =   $row['sum_cod'];


	  $total_sales = $gcash + $cod;

     
     
 
 ?>

 <div class="sales-report-container grid-2-cols-sales-r ">

       <div class="container-left">
	     <h1 class="sales-heading">Today's Sale  </h1>

         <table class="table table-bordered " >
                    <thead>
                        <tr>
                          <th class="t-a-center th-bg-color bg-blue">G-Cash</th>
                          <th class="t-a-center th-bg-color bg-red">Cash On Delivery</th>
                          <th class="t-a-center th-bg-color">Total Sales</th>
                         

                        </tr>

                       <tbody>
                        <tr>
                           <td class="t-a-center"><span class="t-number">&#8369;<?php echo number_format($gcash,2); ?></span></td>
                           <td class="t-a-center"><span class="t-number">&#8369;<?php echo number_format($cod,2) ?></span></td>
                           <td class="t-a-center"><span class="t-number">&#8369;<?php echo number_format($total_sales,2); ?></span></td>
                           
                           
                        </tr>

                       </tbody>


                    </thead>
                </table>


	   </div>

	   
       <div class="container-right-sales-r grid-2-cols-sales-r">
		<div class="el-container">
		<div class="date-container"><label for="" class="date-text">Date:</label>
	   <input type="text" value=" <?php ?>" id="date" > </div>
	   
	    <div class="buttons-container">
		 <button type="submit" id="search" class="btn btn-sm btn-primary button-f-weight">Search</button> 
	       <form method="post" action=""><button type="submit" id="reset"  name="reset" class="btn btn-sm btn-danger"><strong>Reset</strong></button></form>
		   <button type="submit" id="search" class="btn btn-sm btn-success"><strong><a class="link" href="index.php?page=monthly_weekly_sales">Weekly/Monthly</a></strong></button> 
		</div>
		</div>

	   </div>


 </div>

















   <!-- <h1>Today's Sale  </h1>  <h5> Date:  <input type="text" value=" <?php ?>" id="date" >  <button type="submit" id="search" class="btn btn-sm btn-success"><strong>SEARCH</strong></button>     </h5> -->
 

			<table class="table table-bordered margin-top-sales-r">
		<thead>
			 <tr>
			
			<th>#</th>
			<th>Customer</th>
			<th>Seller</th>
			<th>Payment Mode</th>
			<th>Total Cost</th>
			<th>Status</th>
			
			<!-- <th > <form method="post" action=""><button type="submit" id="reset"  name="reset" class="btn btn-sm btn-danger"><strong>RESET</strong></button></form></th> -->
			      <?php
				  
				 if(isset($_POST['reset'])){

					unset($_SESSION['date']);

					echo "<script> window.location ='index.php?page=sales_report'</script>";
				 }
				 
				 ?>
		
		
			</tr>
		</thead>
		<tbody>
         <?php       
		   $qry3 = $conn->query("SELECT * FROM sales_report WHERE date = '$currentDateTime' ");

		   while($row = $qry3->fetch_assoc()):
		 ?>

			 <tr>
			 		<td><?php echo $row['id'] ?></td>
			 		<td><?php echo $row['customer']  ?></td>
			 		<td><?php echo $row['seller']  ?></td>
			 		<td><?php echo $row['payment_mode']?></td>
			 		<td><?php echo '&#8369;' . number_format($row['total_cost'],2)?></td>
					
                     <td>
			 		<?php if($row['status'] == 1): ?>
			 			<span class="badge badge-secondary btn-pad">For Delivery</span>
					 <?php elseif($row['status'] == 2): ?>
					<span class="badge badge-success btn-pad">Delivered</span>
				
			 		<?php endif; ?>
					 </td>  
			 		<td>
			 			<button class="btn btn-sm btn-primary view_order" data-id="<?php echo $row['userId'] ?>" >View Order</button>
						
			 		</td>
			 </tr>
		  <?php endwhile; ?>
		</tbody>
	</table>

	<?php
		/* echo "<br>";
		echo "<div style='clear:both' class='text-center'><ul class='pagination'>{$outputPagination}</ul></div>";
		     */
		?>

		</div>
	</div>
	


      

       <!--  -->


</div>
<script>














$( function() {
    $( "#date" ).datepicker('setDate', '<?php echo  date('m/d/Y',strtotime($currentDateTime));?>');


  } );

 






	$('#search').click(function(){

		let date = $("#date").val();

		$.ajax({
             url: "session_date.php",
			 method: "post",
			 data:{ d: date },
			 success: function(data){
				
			
				
				
                
				window.location = "index.php?page=sales_report" 
			
			}
            

		 });    




	})



	$('#reset').click(function(){

let date = $("#date").val();

$.ajax({
	 url: "unset_date.php",
	 method: "post",
	 data:{ d: date },
	 success: function(data){
		
	
		
		
		
		window.location = "index.php?page=sales_report" 
	
	}
	

 });    




})









	$('.view_order').click(function(){


   uni_modal('Order','view_order_reports.php?id='+$(this).attr('data-id'))


})

	


</script>