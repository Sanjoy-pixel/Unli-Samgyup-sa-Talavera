<?php
session_start();
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include 'db_connect.php';
    
    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function login(){
		extract($_POST);

		// $username = mysqli_real_escape_string($username);
		// $password = mysqli_real_escape_string($password);

		$test1 = $this->db->real_escape_string($username);
		$test2 = $this->db->real_escape_string($password);
              

		$qry = $this->db->query("SELECT * FROM users where username = '".$test1."' and password = '".$test2."' ");
		if($qry->num_rows > 0){
			$_SESSION['user_name'] = $username;
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
					$_SESSION['login_user_time'] = time();
			}
				return 1;
		}else{
			return 3;
		}
	}


	function login2(){

		$response = array(
				'status' => 0,
				'message' => '',
				 
				 );
				 


		extract($_POST);

	


		$qry = $this->db->query("SELECT * FROM user_info where email = '".$email."' and password = '".md5($password)."' ");
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
                if($_SESSION['login_verified'] == 1 ){

			$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
			$this->db->query("UPDATE cart set user_id = '".$_SESSION['login_user_id']."' where client_ip ='$ip' ");
				$response['status'] = 1;
			}
            else {
				session_destroy();
				foreach ($_SESSION as $key => $value) {
				  unset($_SESSION[$key]);
				} 

				$response['status'] = 3;
			}

		}else{
			$response['status'] = 2;
		}
	  
	  echo json_encode($response);	
	}








	// function login2(){
		
		
	// 	extract($_POST);

	// 	$response = array(
	// 		'status' => 0,
	// 		'message' => '',
		 
	// 	 );
		 

	// 	$qry2 = $this->db->query("SELECT * FROM user_info where email = '".$email."' and password = '".md5($password)."' ");

    //     if($qry2->num_rows > 0){ 

			
	// 		foreach ($qry2->fetch_array() as $key => $value) {
	// 			if($key != 'passwors' && !is_numeric($key))
	// 			$_SESSION['signin_'.$key] = $value;
				
				
	// 		}
			
	// 		if($_SESSION['signin_verified'] == 1) {
				
				
	// 			$qry = $this->db->query("SELECT * FROM user_info where email = '".$email."' and password = '".md5($password)."' ");
				
	// 			if($qry->num_rows > 0){
	// 				foreach ($qry->fetch_array() as $key => $value) {
	// 					if($key != 'passwors' && !is_numeric($key))
	// 					$_SESSION['login_'.$key] = $value;
						
	// 				}
					
	// 				$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
	// 				$this->db->query("UPDATE cart set user_id = '".$_SESSION['login_user_id']."' where client_ip ='$ip' ");
					
	// 				$response['status'] = 1;
					
					
	// 			}else{
	// 				$response['status'] = 2;
					
	// 			}
	// 		}
	// 		else {
	// 			$response['status'] = 3;
	// 			echo json_encode($response);
	// 		}
			
	// 	}
    //       else {
	// 		$response['status'] = 2;

	// 	  }

	// 		echo json_encode($response);
			
	// 		//f curly  
	// }

	function logout(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
	}
	function logout2(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../index.php");
	}

	function save_user(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", username = '$username' ";
		$data .= ", password = '$password' ";
		$data .= ", type = '$type' ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO users set ".$data);
		}else{
			$save = $this->db->query("UPDATE users set ".$data." where id = ".$id);
		}
		if($save){
			return 1;
		}
	}
	function signup(){

		$first_name = mysqli_real_escape_string($first_name);
		$last_name = mysqli_real_escape_string($last_name);
		$mobile = mysqli_real_escape_string($mobile);
		$address = mysqli_real_escape_string($address);
		$email = mysqli_real_escape_string($email);
		$password = mysqli_real_escape_string($password);
		
		

		extract($_POST);
		$data = " first_name = '$first_name' ";
		$data .= ", last_name = '$last_name' ";
		$data .= ", mobile = '$mobile' ";
		$data .= ", address = '$address' ";
		$data .= ", email = '$email' ";
		$data .= ", password = '".md5($password)."' ";
		$chk = $this->db->query("SELECT * FROM user_info where email = '$email' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		}
			$save = $this->db->query("INSERT INTO user_info set ".$data);
		if($save){
			$login = $this->login2();
			return 1;
		}
	}

	function save_settings(){
		extract($_POST);

           
		   function add_zero($number){
              if($number == 1){
				
			  return sprintf('%02d', $number);
			  
			}
           

			 else if($number == 2){
				
				return sprintf('%02d', $number);
				
			  }

			  else if($number == 3){
				
				return sprintf('%02d', $number);
				
			  }
			  
			 else  if($number == 4){
				
				return sprintf('%02d', $number);
				
			  }
			  
			 
			 else  if($number == 5){
				
				return sprintf('%02d', $number);
				
			  }
			  
			 else if($number == 6){
				
				return sprintf('%02d', $number);
				
			  }


		 
              else if($number == 7){
				
				return sprintf('%02d', $number);
				
			  }
            
			  else if($number == 8){
				
				return sprintf('%02d', $number);
				
			  }


			  else if($number == 9){
				
				return sprintf('%02d', $number);
				
			  }
              
			  else {
				return $number;
			  }
  

		   
			}


         $converted_hour = add_zero($o_hour);
		 $converted_minute = add_zero($o_minute);
		 $converted_c_hour = add_zero($c_hour);
		 $converted_c_minute = add_zero($c_minute);  
          


		$data = " name = '$name' ";
		$data .= ", email = '$email' ";
		$data .= ", contact = '$contact' ";
		$data .= ", open_hour = '$converted_hour' ";
		$data .= ", open_min = '$converted_minute' ";
		$data .= ", open_median = '$o_median' ";
		$data .= ", close_hour = '$converted_c_hour' ";
		$data .= ", close_min = '$converted_c_minute' ";
		$data .= ", close_median = '$c_median' ";
		$data .= ", min_admin = '$min_admin' ";
		// $data .= ", about_content = '".htmlentities(str_replace("'","&#x2019;",$about))."' ";
		if($_FILES['img']['tmp_name'] != ''){
						$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
						$move = move_uploaded_file($_FILES['img']['tmp_name'],'../assets/img/'. $fname);
					$data .= ", cover_img = '$fname' ";

		}
		
		// echo "INSERT INTO system_settings set ".$data;
		$chk = $this->db->query("SELECT * FROM system_settings");
		if($chk->num_rows > 0){
			$save = $this->db->query("UPDATE system_settings set ".$data." where id =".$chk->fetch_array()['id']);
		}else{
			$save = $this->db->query("INSERT INTO system_settings set ".$data);
		}
		if($save){
		$query = $this->db->query("SELECT * FROM system_settings limit 1")->fetch_array();
		foreach ($query as $key => $value) {
			if(!is_numeric($key))
				$_SESSION['setting_'.$key] = $value;
		}

			return 1;
				}
	}

	
	function save_category(){
		extract($_POST);
        
		$name = mysqli_real_escape_string($name);
		

		$data = " name = '$name' ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO category_list set ".$data);
		}else{
			$save = $this->db->query("UPDATE category_list set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}
	function delete_category(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM category_list where id = ".$id);
		if($delete)
			return 1;
	}
	function save_menu(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", price = '$price' ";
		$data .= ", category_id = '$category_id' ";
		$data .= ", description = '$description' ";
		if(isset($status) && $status  == 'on')
		$data .= ", status = 1 ";
		else
		$data .= ", status = 0 ";

		if($_FILES['img']['tmp_name'] != ''){
						$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
						$move = move_uploaded_file($_FILES['img']['tmp_name'],'../assets/img/'. $fname);
					$data .= ", img_path = '$fname' ";

		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO product_list set ".$data);
		}else{
			$save = $this->db->query("UPDATE product_list set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}

	function delete_menu(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM product_list where id = ".$id);
		if($delete)
			return 1;
	}

	function add_to_cart(){
		extract($_POST);
		$data = " product_id = $pid ";	
		$qty = isset($qty) ? $qty : 1 ;
		$data .= ", qty = $qty ";	
		if(isset($_SESSION['login_user_id'])){
			$data .= ", user_id = '".$_SESSION['login_user_id']."' ";	
		}else{
			$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
			$data .= ", client_ip = '".$ip."' ";	

		}
		$save = $this->db->query("INSERT INTO cart set ".$data);
		if($save)
			return 1;
	}
	function get_cart_count(){
		extract($_POST);
		if(isset($_SESSION['login_user_id'])){
			$where =" where user_id = '".$_SESSION['login_user_id']."'  ";
		}
		else{
			$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
			$where =" where client_ip = '$ip'  ";
		}
		$get = $this->db->query("SELECT sum(qty) as cart FROM cart ".$where);
		if($get->num_rows > 0){
			return $get->fetch_array()['cart'];
		}else{
			return '0';
		}
	}

	function update_cart_qty(){
		extract($_POST);
		$data = " qty = $qty ";
		$save = $this->db->query("UPDATE cart set ".$data." where id = ".$id);
		if($save)
		return 1;	
	}

	function save_order(){
		extract($_POST);
		$data = " name = '".$first_name." ".$last_name."' ";
		$data .= ", address = '$address' ";
		$data .= ", mobile = '$mobile' ";
		$data .= ", email = '$email' ";
		$data .= ", date = '$date' ";
		$data .= ", userId = '$user_id' ";

		if($transaction == "Cash on delivery"){

			$response = array(
				'status' => 0,
				'order_id' => '',
				'user_id' => '',
			 
			 );
			 

		$save = $this->db->query("INSERT INTO orders set ".$data);
		if($save){
			$id = $this->db->insert_id;
			$qry = $this->db->query("SELECT * FROM cart where user_id =".$_SESSION['login_user_id']);

            

			while($row= $qry->fetch_assoc()){

					$data = " order_id = '$id' ";
					$data .= ", product_id = '".$row['product_id']."' ";
					$data .= ", qty = '".$row['qty']."' ";
					$data .= ", date = '$date' ";
                    $data .= ", transaction = '$transaction' ";

					$save2=$this->db->query("INSERT INTO order_list set ".$data);
					if($save2){
						$this->db->query("DELETE FROM cart where id= ".$row['id']);
					}
			}

            $response['status'] = 1;

			echo json_encode($response);
		}

	  }


	  if($transaction == "Gcash"){

        $response = array(
			'status' => 0,
			'order_id' => '',
			'user_id' => '',
		 
		 );
		 

		$save = $this->db->query("INSERT INTO orders set ".$data);

		if($save){
			$id = $this->db->insert_id;
			$response['order_id'] = $id;
			$response['user_id'] = $_SESSION['login_user_id'];

			$qry = $this->db->query("SELECT * FROM cart where user_id =".$_SESSION['login_user_id']);


			while($row= $qry->fetch_assoc()){

					$data = " order_id = '$id' ";
					$data .= ", product_id = '".$row['product_id']."' ";
					$data .= ", qty = '".$row['qty']."' ";
					$data .= ", date = '$date' ";
                    $data .= ", transaction = '$transaction' ";

					$save2=$this->db->query("INSERT INTO order_list set ".$data);
					if($save2){
						$this->db->query("DELETE FROM cart where id= ".$row['id']);
					}
			}

		
		}
		
		$response['status'] = 2;
	   
		echo json_encode($response);
	
	}   


	}

function confirm_order(){
	extract($_POST);
	$save0 = $this->db->query("SELECT * FROM orders  where id='$id' ");
	$row = $save0->fetch_assoc();
	$customer_name = $row['name'];
	$mobile_number = $row['mobile'];
	$sender = "UnliSamgyup";
	$confirm_msg = "Your order had been received. Please wait a couple of minutes, we are currently preparing your food.";
	
    $userId = $row['id'];
	$seller_name = $seller;
	$transaction = $paymentmode;
	$total_cost = $tcost;
	$date = date("Y-m-d");
	

	$day = date('d');
	$year = date('Y');


	$month_num = date('m');

	$month_name = date("F", mktime(0, 0, 0, $month_num, 10));





	    $save1 = $this->db->query("INSERT INTO sales_report(customer,seller,payment_mode,total_cost,date,userId,status) VALUES('$customer_name','$seller_name ','$transaction ','$total_cost','$date','$userId','1') ");
                if($transaction == "Cash on delivery"){
                    $save2 = $this->db->query("INSERT INTO total_sales(gcash,cod,date,userId) VALUES('0','$total_cost','$date','$userId') ");
					
                    if($month_name == "January"){
						$monthly = $this->db->query("INSERT INTO january(month,day,year,total_sales) VALUES('$month_name','$day','$year','$total_cost') ");
					}

					if($month_name == "February"){
						$monthly = $this->db->query("INSERT INTO february(month,day,year,total_sales) VALUES('$month_name','$day','$year','$total_cost') ");
					}

					if($month_name == "March"){
						$monthly = $this->db->query("INSERT INTO march(month,day,year,total_sales) VALUES('$month_name','$day','$year','$total_cost') ");
					}
                     
					if($month_name == "April"){
						$monthly = $this->db->query("INSERT INTO april(month,day,year,total_sales) VALUES('$month_name','$day','$year','$total_cost') ");
					}
                    
					if($month_name == "May"){
						$monthly = $this->db->query("INSERT INTO may(month,day,year,total_sales) VALUES('$month_name','$day','$year','$total_cost') ");
					}
                     
					if($month_name == "June"){
						$monthly = $this->db->query("INSERT INTO june(month,day,year,total_sales) VALUES('$month_name','$day','$year','$total_cost') ");
					}
                    
					if($month_name == "July"){
						$monthly = $this->db->query("INSERT INTO july(month,day,year,total_sales) VALUES('$month_name','$day','$year','$total_cost') ");
						

					}
                
					if($month_name == "August"){
						$monthly = $this->db->query("INSERT INTO august(month,day,year,total_sales) VALUES('$month_name','$day','$year','$total_cost') ");
					}


					if($month_name == "September"){
						$monthly = $this->db->query("INSERT INTO september(month,day,year,total_sales) VALUES('$month_name','$day','$year','$total_cost') ");
					}

                    if($month_name == "October"){
						$monthly = $this->db->query("INSERT INTO october(month,day,year,total_sales) VALUES('$month_name','$day','$year','$total_cost') ");
					}
  
					if($month_name == "November"){
						$monthly = $this->db->query("INSERT INTO november(month,day,year,total_sales) VALUES('$month_name','$day','$year','$total_cost') ");
					}

					if($month_name == "December"){
						$monthly = $this->db->query("INSERT INTO december(month,day,year,total_sales) VALUES('$month_name','$day','$year','$total_cost') ");
					}

   
                     
				
				}

                 else if ($transaction == "Gcash"){

					$save3 = $this->db->query("INSERT INTO total_sales(gcash,cod,date,userId) VALUES('$total_cost','0','$date','$userId') ");

					if($month_name == "January"){
						$monthly = $this->db->query("INSERT INTO january(month,day,year,total_sales) VALUES('$month_name','$day','$year','$total_cost') ");
					}

					if($month_name == "February"){
						$monthly = $this->db->query("INSERT INTO february(month,day,year,total_sales) VALUES('$month_name','$day','$year','$total_cost') ");
					}

					if($month_name == "March"){
						$monthly = $this->db->query("INSERT INTO march(month,day,year,total_sales) VALUES('$month_name','$day','$year','$total_cost') ");
					}
                     
					if($month_name == "April"){
						$monthly = $this->db->query("INSERT INTO april(month,day,year,total_sales) VALUES('$month_name','$day','$year','$total_cost') ");
					}
                    
					if($month_name == "May"){
						$monthly = $this->db->query("INSERT INTO may(month,day,year,total_sales) VALUES('$month_name','$day','$year','$total_cost') ");
					}
                     
					if($month_name == "June"){
						$monthly = $this->db->query("INSERT INTO june(month,day,year,total_sales) VALUES('$month_name','$day','$year','$total_cost') ");
					}
                    
					if($month_name == "July"){
						$monthly = $this->db->query("INSERT INTO july(month,day,year,total_sales) VALUES('$month_name','$day','$year','$total_cost') ");
						

					}
                
					if($month_name == "August"){
						$monthly = $this->db->query("INSERT INTO august(month,day,year,total_sales) VALUES('$month_name','$day','$year','$total_cost') ");
					}


					if($month_name == "September"){
						$monthly = $this->db->query("INSERT INTO september(month,day,year,total_sales) VALUES('$month_name','$day','$year','$total_cost') ");
					}

                    if($month_name == "October"){
						$monthly = $this->db->query("INSERT INTO october(month,day,year,total_sales) VALUES('$month_name','$day','$year','$total_cost') ");
					}
  
					if($month_name == "November"){
						$monthly = $this->db->query("INSERT INTO november(month,day,year,total_sales) VALUES('$month_name','$day','$year','$total_cost') ");
					}

					if($month_name == "December"){
						$monthly = $this->db->query("INSERT INTO december(month,day,year,total_sales) VALUES('$month_name','$day','$year','$total_cost') ");
					}

   
				
				}


				$ch = curl_init();
				$parameters = array(
					'apikey' => '024506ab2f0fb3cc4693c49424a15a13', //Your API KEY
					'number' => $mobile_number,
					'message' => $confirm_msg,
					'sendername' => $sender
				);
				curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
				curl_setopt( $ch, CURLOPT_POST, 1 );
				
				//Send the parameters set above with the request
				curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );
				
				// Receive response from server
				curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
				$output = curl_exec( $ch );
				curl_close ($ch);
				

          if($transaction == "Gcash"){
			$saveg = $this->db->query("UPDATE orders set gcash_status = 3  where id='$id' ");
		  }

		$save = $this->db->query("UPDATE orders set status = 1  where id='$id' ");



		if($save)
			return 1;
}

}