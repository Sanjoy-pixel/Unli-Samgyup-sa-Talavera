
<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			
			<table class="table table-bordered t-font">
		<thead>
			 <tr>

			<th class="t-h">#</th>
			<th class="t-h">Name</th>
			<th class="t-h">Address</th>
			<th class="t-h">Mobile</th>
			<th class="t-h">Date/Time</th>
			<th class="t-h t-a-center ">Status</th>
			<th><a class="nav-link js-scroll-trigger" href="index.php?page=search_orders">Search <svg xmlns="http://www.w3.org/2000/svg" style="width: 20px;" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
</svg></th>
		
		
			</tr>
		</thead>
		<tbody>
			<?php 

           include 'db_connect.php';

           $qry = $conn->query("SELECT * FROM orders ");
           $total_record = $qry->num_rows;

            if(isset($_GET['pagination'])){
	        $page = $_GET['pagination'];
             
		
		   } else{
             $page = 1;

               }


			 $perPage = 7;
             $lastPage = ceil($total_record / $perPage);


			 if($page < 1){ // If it is less than 1
    
				$page = 1; // force if to be 1
			
			}elseif($page > $lastPage){ // if it is greater than $lastpage
			
				$page = $lastPage; // force it to be $lastpage's value
			
			}
			

			$middleNumbers = ''; // Initialize this variable



			$sub1 = $page - 1;
			$sub2 = $page - 2;
			$add1 = $page + 1;
			$add2 = $page + 2;

             
    if($page == 1){
    
		$middleNumbers .= '<li class="btn btn-primary active"><a>' .$page. '</a></li>';
  
		$middleNumbers .= '<li > <a class="btn btn-primary" href="'.$_SERVER['PHP_SELF'].'?page=orders&pagination='.$add1.'">' .$add1. '</a></li>';
  
  } elseif ($page == $lastPage) {
	  
		$middleNumbers .= '<li ><a  class="btn btn-primary"  href="'.$_SERVER['PHP_SELF'].'?page=orders&pagination='.$sub1.'">' .$sub1. '</a></li>';
		$middleNumbers .= '<li class="btn btn-primary active"><a>' .$page. '</a></li>';
  
  }elseif ($page > 2 && $page < ($lastPage -1)) {
  
		$middleNumbers .= '<li><a class="btn btn-primary"  href="'.$_SERVER['PHP_SELF'].'?page=orders&pagination='.$sub2.'">' .$sub2. '</a></li>';
  
		$middleNumbers .= '<li ><a class="btn btn-primary"  href="'.$_SERVER['PHP_SELF'].'?page=orders&pagination='.$sub1.'">' .$sub1. '</a></li>';
  
		$middleNumbers .= '<li class="btn btn-primary active" ><a>' .$page. '</a></li>';
  
		$middleNumbers .= '<li ><a class="btn btn-primary"  href="'.$_SERVER['PHP_SELF'].'?page=orders&pagination='.$add1.'">' .$add1. '</a></li>';
  
		$middleNumbers .= '<li><a class="btn btn-primary" href="'.$_SERVER['PHP_SELF'].'?page=orders&pagination='.$add2.'">' .$add2. '</a></li>';
  
	   
  
  
  } elseif($page > 1 && $page < $lastPage){
  
	   $middleNumbers .= '<li ><a class="btn btn-primary"  href="'.$_SERVER['PHP_SELF'].'?page=orders&pagination='.$sub1.'">' .$sub1. '</a></li>';
  
	   $middleNumbers .= '<li class="btn btn-primary active"><a>' .$page. '</a></li>';
   
	   $middleNumbers .= '<li><a class="btn btn-primary"  href="'.$_SERVER['PHP_SELF'].'?page=orders&pagination='.$add1.'">' .$add1. '</a></li>';
  
  

  
  }
  


  $limit = 'LIMIT ' . ($page-1) * $perPage . ',' . $perPage;
  $qry2 = $conn->query("SELECT * FROM orders ORDER BY id DESC $limit ");
  
 
  $outputPagination = "";


    
  if($page != 1){
    
    
	$prev  = $page - 1;

	$outputPagination .='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page=orders&pagination='.$prev.'">Back</a></li>';
}

$outputPagination .= $middleNumbers;

if($page != $lastPage){
    
    
	$next = $page + 1;

	$outputPagination .='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page=orders&pagination='.$next.'">Next</a></li>';

}



		

	
			
			
			
			while($row = $qry2->fetch_assoc()):
			 ?>
			 <tr>
			 		<td class="t-d"><?php echo $row['id'] ?></td>
			 		<td class="t-d"><?php echo $row['name'] ?></td>
			 		<td class="t-d"><?php echo $row['address'] ?></td>
			 		<td class="t-d"><?php echo $row['mobile'] ?></td>
			 		<td class="t-d"><?php 
					
					$date = $row['date']; 

					$id = $row['id'];

				

					echo date('m/d/Y  h:i A', strtotime($date));
					
					?></td>
					
	 
			 		<?php if($row['status'] == 1): ?>
			 			<td class="text-center v-align"><span class="badge badge-success btn-pad">Confirmed</span></td>
					 <?php elseif($row['status'] == 2): ?>
					<td class="text-center v-align"><span class="badge badge-danger btn-pad">Delivered</span></td>
					
					<?php else: ?>
			 			<td class="text-center v-align"><span class="badge badge-secondary btn-pad">For Verification</span></td>
			 		<?php endif; ?>
			 		<td class="text-center v-align">
			 			<button class="btn btn-sm btn-primary view_order" data-id="<?php echo $id;//$row['id'] ?>" >View Order</button>
					    <input type="hidden" id="test"  value="<?php echo $id;//$row['id'] ?>">
			 		</td>
			 </tr>




			<?php endwhile; ?>
		</tbody>
	</table>

	<?php
		echo "<br>";
		echo "<div style='clear:both' class='text-center'><ul class='pagination'>{$outputPagination}</ul></div>";
		    
		?>

		</div>
	</div>
	

	<?php  // $qry0 = $conn->query("SELECT * FROM orders ");
	       // $row0 = $qry0->fetch_assoc();
			//$transact = $conn->query("SELECT * FROM order_list o inner join product_list p on o.product_id = p.id  where order_id = ".$$row0['id']);
			///$row1 = $transact->fetch_assoc();
			//echo  $row1['transaction'];
			//echo $row['id'];
       

			?>
      

       <!--  -->


</div>




		








<script>
       


	$('.view_order').click(function(){

		let test = $("#test").val();

		console.log(test);
		
		uni_modal('Order','view_order.php?id='+$(this).attr('data-id')+'&seller=<?php echo $_SESSION['login_name']?>')
	})
</script>