<div class="container-fluid">
	
	<table class="table table-bordered">
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
			$qry2 = $conn->query("SELECT * FROM orders WHERE id = '$orderId' ");
			$status = $qry2->fetch_assoc(); 

			$qry = $conn->query("SELECT * FROM order_list o inner join product_list p on o.product_id = p.id  where order_id =".$_GET['id']);
			while($row=$qry->fetch_assoc()):

                 $qty = $row['qty'];

				 $price = $row['price'];


				$total +=  $qty * $price;

				$tl = number_format($row['qty'] * $row['price'],2);
			?>
			<tr>
				<td class="t-d t-a-center"><?php echo $row['qty'] ?></td>
				<td class="t-d t-a-center"><img src="../assets/img/<?php echo $row['img_path']?>" class="order-img"> <?php echo $row['name'] ?>    </td>
				<td class="t-d t-a-center"><?php echo $row['transaction'] ?></td>
				<?php $t = $row['transaction'];  
				
				
				?>
			
				<input type="hidden" name="seller" id="seller" value="<?php echo $_GET['seller']?>">
				<input type="hidden" name="transaction" id="transaction" value="<?php echo $t ?>">
				
			
				
				<td class="t-d t-a-center"><?php echo $tl; ?></td>

			
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
	
	                      <?php if($status['status'] == 2): ?>
			 			
						  <?php else: ?>
						    <button class="btn btn-primary" id="confirm" type="button" onclick="mark_order()">Mark as delivered</button>
						  <?php endif; ?>


        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		
        
		

	</div>
</div>
<style>
	#uni_modal .modal-footer{
		display: none
	}
</style>
<script>


function mark_order(){

		

start_load()











$.ajax({
	url:'update_status.php',
	method:'POST',
	data:{id:'<?php  echo $_GET['id'] ?>'},
	success:function(data){
		
			alert_toast("Mark as Delivered")
				setTimeout(function(){
					location.reload()
				},1500)
		
	}
})
}




</script>