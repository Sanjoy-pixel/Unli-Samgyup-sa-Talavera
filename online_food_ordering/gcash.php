<?php

use Xendit\Xendit;
require 'vendor/autoload.php';
require 'admin/db_connect.php';

if (isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
}

if (isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
}



			$total = 0;

			$qry2 = $conn->query("SELECT * FROM orders WHERE id = '$order_id' ");
			$status = $qry2->fetch_assoc();

			$qry = $conn->query("SELECT * FROM order_list o inner join product_list p on o.product_id = p.id  where order_id =".$order_id);
			// $qry2 = $conn->query("SELECT * FROM orders WHERE userId = ' $userId' ");
			while($row=$qry->fetch_assoc()){

                 $qty = $row['qty'];

				 $price = $row['price'];


				$total +=  $qty * $price;
            }
            
Xendit::setApiKey('xnd_production_iJ9EpCwkmsOLQevuecvEZOg6TRdALuHEGjczU6qSoEjV7V61KwxSWqzhXWKoKkq');

$params = [
    'reference_id' => 'test-reference-id',
    'currency' => 'PHP',
    'amount' => $total,
    'checkout_method' => 'ONE_TIME_PAYMENT',
    'channel_code' => 'PH_GCASH',
    'channel_properties' => [
        'success_redirect_url' => "http://localhost/dist/admin/thankyoupage.php?id="."$order_id",
        'failure_redirect_url' => 'https://dashboard.xendit.co/register/1',
    ],
    'metadata' => [
        'branch_code' => 'tree_branch'
    ]
];

$createEWalletCharge = \Xendit\EWallets::createEWalletCharge($params);

$redirect = $createEWalletCharge['actions']['desktop_web_checkout_url'];

$ewallet_id = $createEWalletCharge['id'];


$status = $conn->query("INSERT INTO gcash_payment(payment_id,order_id) VALUES('$ewallet_id','$order_id ') ");



echo "<script>window.location ='".$redirect."'</script>";
