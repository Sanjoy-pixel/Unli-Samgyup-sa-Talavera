<div class="container-fluid">
	
<form action="" id="login-frm" method="post">
		

        <div class="form-group">
			<label for="" class="control-label">Name</label>
			<input type="text" name="name" id="name" required="" class="form-control">
		</div>

        <div class="form-group">
			<label for="" class="control-label">User Name</label>
			<input type="text" name="username" id="username" required="" class="form-control">
		</div>
		
		<div class="form-group">
			<label for="" class="control-label">Password</label>
			<input type="password" name="password" id="password" required="" class="form-control">
		</div>

		<div class="form-group">
			<label for="" class="control-label">User Type</label>

<select id="type" class="form-control" >
       <option value="1">Admin</option>
      <option value="2">Staff</option>
      
</select>


	
		</div>
		

		

	</form>

	<div class="text-center">
		<button class="btn btn-primary" id="confirm" type="submit" name="add"  onclick="test()">Add</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

	</div>
</div>
         <style>
	#uni_modal .modal-footer{
		display: none
	}
</style>



<script>

    function test(){
	 let name = $("#name").val();
	 let userName = $("#username").val();
	 let password = $("#password").val();
	 let type = $("#type").val();

	 $.ajax({
             url: "add_user.php",
			 method: "post",
			 data:{ n: name, un: userName, pass: password, ty: type},
			 success: function(data){
				
				start_load()
				
				alert_toast("User successfully added.")
                
				setTimeout('window.location ="index.php?page=users"',1500);    
			
			}
            

		 });    

	}

</script>