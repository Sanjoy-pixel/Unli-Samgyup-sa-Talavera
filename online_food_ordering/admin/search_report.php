
<div class="container-fluid">
	<div class="card">
		<div class="card-body">





		<div class="form-group has-search">
   
  </div>
   <?php 
     include 'db_connect.php'; 
	 $currentDateTime=date('Y-m-d');

	 $qry = $conn->query("SELECT SUM(gcash) AS 'sum_gcash' FROM total_sales WHERE date = '$currentDateTime'"); 
        
	 $row = $qry->fetch_assoc();

	 $gcash = $row['sum_gcash'];

	 
	 $qry1 = $conn->query("SELECT SUM(cod) AS 'sum_cod' FROM total_sales WHERE date = '$currentDateTime'"); 
        
     $row = $qry1->fetch_assoc();

      $cod =   $row['sum_cod'];


	  $total_sales = $gcash + $cod;

     
     
 
 ?>
   <h1>Today's Sale  </h1>  <h5> Date:  <input type="text" value="<?php echo  $currentDateTime; ?>" id="date">  </h5> 
   <h5> Gcash: <?php  echo '&#8369;'.  $gcash ?></h5>
   <h5> Cash on delivery: <?php  echo '&#8369;'. $cod ?>  </h5>
   <h5> Total Sales: <?php  echo '&#8369;'. $total_sales; ?>  </h5>
   


			<table class="table table-bordered ">
		<thead>
			 <tr>

			<th>#</th>
			<th>Customer</th>
			<th>Seller</th>
			<th>Payment Mode</th>
			<th>Total Cost</th>
			<th ></th>
			
		
		
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
			 		<td><?php echo '&#8369;' . $row['total_cost'] ?></td>
					
					
			 		<td>
			 			<button class="btn btn-sm btn-primary view_order" data-id="<?php ?>" >View Order</button>
						
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





	$('.view_order').click(function(){

		let test = $("#test").val();

		console.log(test);


		uni_modal('Order','view_order.php?id='+$(this).attr('data-id'))
	})
</script>