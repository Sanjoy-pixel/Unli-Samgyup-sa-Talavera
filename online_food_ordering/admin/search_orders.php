
<div class="container-fluid">
	<div class="card">
		<div class="card-body">

		<?php
            
            if (isset($_GET['product'])){
                $product =  urldecode($_GET['product']);

            }
             else {
               $product = "";
             }
            
            
            ?>




		<div class="form-group has-search">
    <input type="text"  class="form-control searchInput" value="<?php echo $product; ?>"  placeholder="Search Customer Name Here..."  >
  </div>


			<table class="table table-bordered t-font">
		<thead>
			 <tr>

			<th>#</th>
			<th>Name</th>
			<th>Address</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Status</th>
		
		
			</tr>
		</thead>
		<tbody>
			<?php 

           include 'db_connect.php';  

          
		   $qry = $conn->query("SELECT * FROM orders WHERE name LIKE '$product%' limit 10 ");
		   
		 
		   if($qry->num_rows == 0){

			echo '<div class="alert alert-primary" role="alert" style="width: 100%;"> <h5 style="text-align: center;"> No Results Found!</h5>

          </div>';
		  }
      /*      $total_record = $qry->num_rows;

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
  $qry2 = $conn->query("SELECT * FROM orders $limit ");
  
 
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
 */


		

	
			
			
			
			while($row = $qry->fetch_assoc()):
			 ?>
			 <tr>
			 		<td><?php echo $row['id'] ?></td>
			 		<td><?php echo $row['name'] ?></td>
			 		<td><?php echo $row['address'] ?></td>
			 		<td><?php echo $row['email'] ?></td>
			 		<td><?php echo $row['mobile'] ?></td>
					
	 
			 		<?php if($row['status'] == 1): ?>
			 			<td class="text-center"><span class="badge badge-success btn-pad t-font">Confirmed</span></td>

					<?php elseif($row['status'] == 2): ?>
					<td class="text-center v-align"><span class="badge badge-danger btn-pad">Delivered</span></td>
						
			 		<?php else: ?>
			 			<td class="text-center"><span class="badge badge-secondary btn-pad t-font">For Verification</span></td>
			 		<?php endif; ?>
			 		<td>
			 			<button class="btn btn-sm btn-primary view_order t-font-oder-btn" data-id="<?php echo $row['id'] ?>" >View Order</button>
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


$(".searchInput").focus()

document.addEventListener('mouseover', function (e) {
if (e.target.localName ==='input'){
e.target.focus();
var val = e.target.value; //store the value of the element
e.target.value = '';      //clear the value of the element
e.target.value = val;     //set that value back. 
}
});

document.addEventListener('mouseout', function (e) {
e.target.blur();
});

	 $( function(){
	  var timer;
		
	  $(".searchInput").keyup(function(){
		clearTimeout(timer);
		timer = setTimeout( function(){
		  var val = $(".searchInput").val();
		  window.location="index.php?page=search_orders&product="+ val;
		 
		}, 2000)
	  })

	 })



	$('.view_order').click(function(){
		uni_modal('Order','view_order.php?id='+$(this).attr('data-id'))
	})
</script>