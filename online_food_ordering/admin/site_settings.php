<?php
include 'db_connect.php';
$qry = $conn->query("SELECT * from system_settings limit 1");
if($qry->num_rows > 0){
	foreach($qry->fetch_array() as $k => $val){
		$meta[$k] = $val;
	}
}
 ?>
<div class="container-fluid">
	
	<div class="card col-lg-12">
		<div class="card-body">
			<form action="" id="manage-settings">
				<div class="form-group">
					<label for="name" class="control-label">System Name</label>
					<input type="text" class="form-control" id="name" name="name" value="<?php echo isset($meta['name']) ? $meta['name'] : '' ?>" required>
				</div>
				<div class="form-group">
					<label for="email" class="control-label">Email</label>
					<input type="email" class="form-control" id="email" name="email" value="<?php echo isset($meta['email']) ? $meta['email'] : '' ?>" required>
				</div>
				<div class="form-group">
					<label for="contact" class="control-label">Contact</label>
					<input type="text" class="form-control" id="contact" name="contact" value="<?php echo isset($meta['contact']) ? $meta['contact'] : '' ?>" required>
				</div>
    
	
				<div class="otime-container">


      <div class="oc-container">

			<div class="content-container">
				  <h3 class="otime-heading">Opening Time</h3>
				
				 <div class="time-container">
				    <div class="input-container"> 
					<label for="o_hour">Hour</label>
					<input type="number" id="o_hour" name="o_hour" value="<?php echo isset($meta['open_hour']) ? $meta['open_hour'] : '' ?>" required>
					</div>   
                     <span class="colon">:</span>
					<div class="input-container">
					<label for="o_minute" >Minute</label>
					<input type="number" id="o_minute" name="o_minute" value="<?php echo isset($meta['open_min']) ? $meta['open_min'] : '' ?>" required>
					</div>

				<div class="input-container">
					<label for="o_median" >AM/PM</label>
					 <select id="o_median" name="o_median">
						<option value="<?php echo isset($meta['open_median']) ? $meta['open_median'] : '' ?>"><?php echo isset($meta['open_median']) ? $meta['open_median'] : '' ?></option>
						<option value="AM">AM</option>
						<option value="PM">PM</option>
					 </select>
				</div>

		      </div>	
				
			</div>   

			<div class="content-container">             
				<h3 class="otime-heading">Closing Time</h3>
				<div class="time-container">
				    <div class="input-container"> 
					<label for="c_hour">Hour</label>
					<input type="number" id="c_hour" name="c_hour" value="<?php echo isset($meta['close_hour']) ? $meta['close_hour'] : '' ?>" required>
					</div>   
                     <span class="colon">:</span>
					<div class="input-container">
					<label for="c_minute" >Minute</label>
					<input type="number" id="c_minute" name="c_minute" value="<?php echo isset($meta['close_min']) ? $meta['close_min'] : '' ?>" required>
					</div>

				<div class="input-container">
					<label for="c_median">AM/PM</label>
					 <select id="c_median" name="c_median">
					 <option value="<?php echo isset($meta['close_median']) ? $meta['close_median'] : '' ?>"><?php echo isset($meta['close_median']) ? $meta['close_median'] : '' ?></option>
						<option value="PM">PM</option>
						<option value="AM">AM</option>
					 </select>
				</div>

             </div>


		</div>

    </div>


		<div class="admin-session">

		<div class="admin-content-container">
		<h3 class="otime-heading">Admin Session Timeout</h3>
		<div class="admin-input">
		<label for="min-admin">Minutes</label>
		<input type="text" id="min_admin" name="min_admin" value="<?php echo isset($meta['min_admin']) ? $meta['min_admin'] : '' ?>" required>
		</div>
	
	         </div>
	    </div>	 	
		
	</div>




                   
	
	</div>
				<div class="form-group">
					<label for="" class="control-label">Cover Photo</label>
					<input type="file" class="form-control" name="img" onchange="displayImg(this,$(this))">
				</div>
				<div class="form-group">
					<img src="<?php echo isset($meta['cover_img']) ? '../assets/img/'.$meta['cover_img'] :'' ?>" alt="" id="cimg">
				</div>
				<center>
					<button class="btn btn-info btn-primary btn-block col-md-2">Save</button>
				</center>
			</form>
		</div>
	</div>
	<style>
	img#cimg{
		max-height: 10vh;
		max-width: 6vw;
	}
</style>

<script>
	function displayImg(input,_this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        	$('#cimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
	$('.text-jqte').jqte();

	$('#manage-settings').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_settings',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			error:err=>{
				console.log(err)
			},
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved.','success')
					setTimeout(function(){
						location.reload()
					},1000)
				}
			}
		})

	})
</script>
<style>
	
</style>
</div>