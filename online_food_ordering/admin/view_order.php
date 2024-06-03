<?php

use Xendit\Xendit;
require '../vendor/autoload.php';



?>









<div class="container-fluid">
	
	<table class="table table-bordered ">
		<thead>
			<tr>
				<th>Qty</th>
				<th class="t-a-center">Order</th>
				<th>Transaction</th>
				<th>Amount</th>
				

			</tr>
		</thead>
		<tbody>
			<?php 
			$total = 0;
			include 'db_connect.php';
			$orderId = $_GET['id'];


			// xendit code

            $transaction = $conn->query("SELECT * FROM order_list o inner join product_list p on o.product_id = p.id  where order_id =".$_GET['id']);
			$transact = $transaction->fetch_assoc();     
              
			if($transact['transaction'] == "Gcash"){
				$qry1 = $conn->query("SELECT * FROM gcash_payment WHERE order_id = '$orderId' ");
				$payment_stat = $qry1->fetch_assoc();
				$_cid = $payment_stat['payment_id'];
				Xendit::setApiKey('xnd_production_iJ9EpCwkmsOLQevuecvEZOg6TRdALuHEGjczU6qSoEjV7V61KwxSWqzhXWKoKkq');
				$getEWalletChargeStatus = \Xendit\EWallets::getEWalletChargeStatus($_cid);
				$payment_status = $getEWalletChargeStatus['status'];
			

			}

         

			//--------------------------------------------



			$qry2 = $conn->query("SELECT * FROM orders WHERE id = '$orderId' ");
			$status = $qry2->fetch_assoc();
			$qry = $conn->query("SELECT * FROM order_list o inner join product_list p on o.product_id = p.id  where order_id =".$_GET['id']);
			// $qry2 = $conn->query("SELECT * FROM orders WHERE userId = ' $userId' ");
			while($row=$qry->fetch_assoc()):

                 $qty = $row['qty'];

				 $price = $row['price'];


				$total +=  $qty * $price;

				
			?>


			<tr>


				<td class="t-d t-a-center"><?php echo $row['qty'] ?></td>
				<td class="t-d t-a-center"><img src="../assets/img/<?php echo $row['img_path']?>" class="order-img"> <?php echo $row['name'] ?></td>
				<td class="t-d t-a-center"><?php echo $row['transaction'] ?></td>
				<td class="t-d t-a-center"><?php echo number_format($row['qty'] * $row['price'],2) ?></td>
		
				<input type="hidden" name="seller" id="seller" value="<?php echo $_GET['seller']?>">
				<input type="hidden" name="transaction" id="transaction" value="<?php echo $row['transaction'];?>">
		
			
			</tr>

		<?php endwhile; ?>


		<input type="hidden" name="total" id="total" value="<?php  echo $total;  ?>">
       

		</tbody>
		<tfoot>
			<tr>
				<th colspan="3" class="text-right">TOTAL</th>
				<th >  <?php echo "&#8369;" . number_format($total,2) ?></th>
			</tr>

		</tfoot>
	</table>
	<div class="text-center">
                         
                 
	                <?php
					 
					 if(isset($payment_status)){
						if($payment_status == "SUCCEEDED"){
						  echo "<button class='btn btn-success'  type='button'>Paid</button>";
						}
					    else{
						  echo "<button class='btn btn-secondary'  type='button'>UnPaid</button>";	
						}
						
					 }
					 
					 
					 ?>  


	                 
	

            
	                <?php if($status['status'] == 1): ?>
			 			
					<?php elseif($status['status'] == 2): ?>

					<?php elseif($status['gcash_status'] == 3): ?>	

					<?php elseif($transact['transaction'] == "Gcash"): ?>
					 
			 		<?php else: ?>
					<button class="btn btn-primary" id="confirm" type="button" onclick="confirm_order()">Confirm</button>
			 		<?php endif; ?>

                      <?php
		
					       if(isset($payment_status)){
							if($payment_status !== "SUCCEEDED"){
								
							  }   

                              if($payment_status == "SUCCEEDED"){
                                  
								if($status['gcash_status'] == 3){
                                   $gstatus = "gstatus";
								  } 
								   else{
									$gstatus = "none";
								   }
						

								echo "<button class='btn btn-primary $gstatus' id='confirm' type='button' onclick='confirm_order()'>Confirm</button>";
							  }
							 
					
						   }
                           
						    
					 
					 ?>
					
                    


                    <button type="button" class="btn btn-secondary btn-modal-pad" data-dismiss="modal">Close</button>
		

		

	</div>
</div>
<style>
	#uni_modal .modal-footer{
		display: none
	}

    .gstatus{
		display: none
	}

</style>
<script>


	function confirm_order(){

		

		start_load()

	 let seller = $("#seller").val();
	 let transaction = $("#transaction").val();
	 let total = $("#total").val();

	

	


	


		$.ajax({
			url:'ajax.php?action=confirm_order',
			method:'POST',
			data:{id:'<?php  echo $_GET['id'] ?>', seller: seller,  paymentmode: transaction, tcost: total},
			success:function(resp){
				if(resp == 1){
					alert_toast("Order confirmed.")

                        setTimeout(function(){
                            location.reload()
                        },1500)

				}
			}
		})
	
	
	
	}









</script>