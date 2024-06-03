<div class="container-fluid">
	
<div class="col-md-15">
                                <div class="form-group">
								<p class="help-block text-danger" id="alert-m"></p>
								
                                    <textarea class="form-control"  name="message" placeholder="Your Message *" id="message" required></textarea>
                                    
									
									
								
                                </div>


</div>

<?php 
 $date = $_GET['date']; 

 $orderList = $_GET['id'];

 $orderId = $_GET['userId'];
?>

 <input type="hidden" id="date" value="<?php echo $date?>">

 <input type="hidden" id="orderList" value="<?php echo $orderList ?>">

 <input type="hidden" id="orderId" value="<?php echo $orderId ?>">


 <button class="btn btn-primary" id="confirm" type="button" onclick="cancel_order()">Send</button>



<style>
	.modal-footer {
		display: none;
	}
</style>


<script>


	function cancel_order(){

		

		

	 let date = $("#date").val();
	 
	 let orderList = $("#orderList").val();
	 let orderId = $("#orderId").val();
     let message = $("#message").val();

	
    console.log(orderList);
	

	if (message !== "") {
		start_load()
	
		$.ajax({
			url:'delete_orders.php',
			method:'POST',
			data:{ d: date, ol: orderList,  oi: orderId, m: message},
			success:function(data){
				alert_toast("Order Cancelled")
                        setTimeout(function(){
                            location.reload()
                        },1500)
			}
		}) 
	

	
	}
	  else {

		$("#alert-m").html('<span>Please enter a message.</span>');
		
	  }


	
	
	}




</script>