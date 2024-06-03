<?php

function save_order(){
    extract($_POST);
    $data = " name = '".$first_name." ".$last_name."' ";
    $data .= ", address = '$address' ";
    $data .= ", mobile = '$mobile' ";
    $data .= ", email = '$email' ";
    $data .= ", date = '$date' ";
    $data .= ", userId = '$user_id' ";

    if($transaction == "Cash on delivery"){

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
        return 1;
    }

  }


  if($transaction == "Gcash"){

    $save = $this->db->query("INSERT INTO orders set ".$data);

    return 2;
    // if($save){
    // 	$id = $this->db->insert_id;
    // 	$qry = $this->db->query("SELECT * FROM cart where user_id =".$_SESSION['login_user_id']);
    // 	while($row= $qry->fetch_assoc()){

    // 			$data = " order_id = '$id' ";
    // 			$data .= ", product_id = '".$row['product_id']."' ";
    // 			$data .= ", qty = '".$row['qty']."' ";
    // 			$data .= ", date = '$date' ";
    //             $data .= ", transaction = '$transaction' ";

    // 			$save2=$this->db->query("INSERT INTO order_list set ".$data);
    // 			if($save2){
    // 				$this->db->query("DELETE FROM cart where id= ".$row['id']);
    // 			}
    // 	}
        
    // 	return 2;	
    // }
    
  }   



}
