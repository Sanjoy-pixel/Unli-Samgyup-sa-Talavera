<?php session_start() ?>
<div class="container-fluid">
	<form action="" id="login-frm">
		<div class="form-group">
			<label for="" class="control-label">Email</label>
			<input type="email" name="email" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Password</label>
			<input type="password" name="password" required="" class="form-control" id="test"><br>
			<div class="check-box"> <input type="checkbox" onclick="myFunction()" > show password </div>
			<small><a href="index.php?page=new_acc" id="">Create New Account</a></small>
			<small style="margin-left: 10px;"><a href="index.php?page=forgot" id="new_account">Forgot Password?</a></small>
		</div>
		<button class="button btn btn-info btn-sm">Login</button>
	</form>
</div>

<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>

<script>
	$('#new_account').click(function(){
		uni_modal("Create an Account",'signup.php?redirect=index.php?page=checkout')
	})
	$('#login-frm').submit(function(e){
		e.preventDefault()
		$('#login-frm button[type="submit"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'admin/ajax.php?action=login2',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				
                 let response = JSON.parse(resp);   

				console.log(response);
			
				if( response.status == 1){
                   
				location.href ='<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=home' ?>';
					
				}


                 if(response.status == 2){
					$('#login-frm').prepend('<div class="alert alert-danger">Email or password is incorrect.</div>')
					$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');

				 }


				 if(response.status == 3){
					$('#login-frm').prepend('<div class="alert alert-warning">Email not yet verified, click this link to verify. <a href="index.php?page=email_manual_verification">Here</a></div>')
					$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');

				 }

                 

				
				// else if( response.status == 2){
				// 	$('#login-frm').prepend('<div class="alert alert-danger">Email or password is incorrect.</div>')
				// 	$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');
				// }
                 
				// else if( response.status == 3){
				// 	$('#login-frm').prepend('<div class="alert alert-second">Email not yet verified</div>')
				// 	$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');
				// }

			}
		})
	})

  function myFunction() {
  var x = document.getElementById("test");
  if (x.type === "password") {
    x.type = "text";
	element.classList.add("form-control");
  } else {
    x.type = "password";
  }
}






</script>