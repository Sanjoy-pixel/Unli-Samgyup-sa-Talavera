<!-- Masthead-->
<header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                    	 <h1 class="text-uppercase text-white font-weight-bold my-order">My Order</h1>
                        <hr class="divider my-4" />
                    </div>
                    
                </div>
            </div>
        </header>

    <section class="page-section">
        <div class="container">
   

        <div class="container-fluid em32">
	<div class="card">
		<div class="card-body">
			
			<table class="table table-bordered">
		<thead>
			 <tr>

		
			<th class="t-h">Status</th>
			<th class="t-h">Date</th>
			<th></th>
			
	
			</tr>
		</thead>
		<tbody>
	

<?php 

include 'admin/db_connect.php';


if(isset($_GET['id'])){
    
    $userId = $_GET['id'];
    
    

$qry2 = $conn->query("SELECT * FROM orders WHERE userId = ' $userId' ");

} 




while($row = $qry2->fetch_assoc()):




?>
  

 

			 <tr >

			 		<?php if($row['status'] == 1): ?>
			 			<td class="t-d"><span class="badge badge-success btn-pad em32">Confirmed</span></td>
					<?php elseif($row['status'] == 2): ?>
					<td class="t-d"><span class="badge badge-danger btn-pad em32">Delivered</span></td>
			 		<?php else: ?>
			 			<td class="t-d"><span class="badge badge-secondary btn-pad em32">For Verification</span></td>
			 		<?php endif; ?>
                    </td>
			 		<td class="t-d"><?php


                 
					
					 $date = $row['date']; 

					echo date('m/d/Y  h:i A', strtotime($date));

                    $currentDateTime=date('Y/m/d H:i:s');
				 

					
					
					
					
					
					
					
					?></td>
			 		
			 
			 		<td class="t-d">
			 			<button class="btn btn-sm btn-primary view_order em32" data-id="<?php echo $row['id'] ?>" style="text-align: center;">View Order</button>
						 <?php if($row['status'] == 1): ?>

						<?php elseif($row['status'] == 2): ?>
					       
						<?php else: ?>
						 <button  name="reset" class="btn btn-sm btn-danger cancel em32" data-id=" <?php echo $row['id'] ?>" >Cancel Order</button>
						 <?php endif; ?>
			 		</td>
			 </tr>
             <?php endwhile; ?>
		</tbody>
	</table>



		</div>
	</div>
	


      

       <!--  -->


</div>






        </div>
        </section>





        <script>
	$('.view_order').click(function(){
		uni_modal('Order','view_my_order.php?id='+$(this).attr('data-id'))
	})

    $('.cancel').click(function(){
		uni_modal('Reason For Cancellation','cancel_order.php?id='+$(this).attr('data-id')+'&userId=<?php echo $userId ?>'+'&date=<?php echo $currentDateTime ?>')
	})





</script>