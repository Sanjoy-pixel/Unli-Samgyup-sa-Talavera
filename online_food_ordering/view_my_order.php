






<div class="container-fluid em44">
	
	<table class="table table-bordered ">
		<thead>
			<tr>
				<th>Qty</th>
				<th class="t-h ">Order</th>
				<th>Transaction</th>
				<th>Amount</th>
				

			</tr>
		</thead>
		<tbody>

		<?php 
			$total = 0;
			include 'admin/db_connect.php';

			$qry = $conn->query("SELECT * FROM order_list o inner join product_list p on o.product_id = p.id  where order_id =".$_GET['id']);
			
		
			while($row=$qry->fetch_assoc()):
				$total += $row['qty'] * $row['price'];
			?>
			
			<tr>
				<td class="t-d"><?php echo $row['qty'] ?></td>
				<td class="t-d"><img class="img-order" src="assets/img/<?php echo $row['img_path']?>"   > <?php echo $row['name'] ?>  </td>
				<td class="t-d"><?php echo $row['transaction'] ?></td>
				<td class="t-d"><?php echo number_format($row['qty'] * $row['price'],2) ?></td>
			</tr>

			<?php endwhile; ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="3" class="text-right">TOTAL</th>
				<th><?php echo "&#8369;" . number_format($total,2) ?> </th>
			</tr>

		</tfoot>
	</table>
	<div class="text-center">


		
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->

	</div>


</div>

<style>
	.modal-footer {
		display: none;
	}

	.btn {
	
	}
</style>

