<div class="container-fluid">
	




<form action="add_user.php" id="login-frm" method="post">

      <?php

        include 'db_connect.php';
        $id = $_GET['id'];

        $users = $conn->query("SELECT * FROM users WHERE id='{$id}'");

        $row = $users->fetch_assoc();
     
//    ?>


     
      
      
         <div class="form-group">
			<input type="hidden" name="name" id="id" required="" value="<?php echo $row['id']?>" class="form-control">
		</div>


        <div class="form-group">
			<label for="" class="control-label">Name</label>
			<input type="text" name="name" id="name" required="" value="<?php echo $row['name']?>" class="form-control">
		</div>

        <div class="form-group">
			<label for="" class="control-label">User Name</label>
			<input type="text" name="username" id="username" required="" value="<?php echo $row['username']?>"  class="form-control">
		</div>
		
		<div class="form-group">
			<label for="" class="control-label">Password</label>
			<input type="password" name="password" id="password" required="" value="<?php echo $row['password']?>"  class="form-control">
		</div>

		<div class="form-group">
			<label for="" class="control-label">User Type</label>
			<select id="type" class="form-control" >
       <option value="1"><?php if($row['type'] == 1){
		echo "Admin";


	   } else{
        echo "Staff";

	   }
	   
	   ?> </option>
      <option value="1">Admin</option>
	  <option value="2">Staff</option>


</select>

		</div>
		
    
		

	</form>

	<div class="text-center">
		<button class="btn btn-primary" id="confirm" type="submit" name="add"  onclick="test()">Save Changes</button>
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
	 let id = $("#id").val();
	 let name = $("#name").val();
	 let userName = $("#username").val();
	 let password = $("#password").val();
	 let type = $("#type").val();

	 $.ajax({
             url: "update_user.php",
			 method: "post",
			 data:{ i: id, n: name, un: userName, pass: password, ty: type},
			 success: function(data){
				
				start_load()
				
				alert_toast("User successfully updated.")
                
				setTimeout('window.location ="index.php?page=users"',1500);    
			
			}
            

		 });    

	}

</script>