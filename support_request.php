<?php 
include 'conf.php';
$data =  json_decode($_POST['data'], true);
$your_message       = $data['your_message'];
$user_email 		= $data['user_email'];
$store_shop         = $data['store_shop'];
$fetch_record 		= "SELECT * FROM product_tabs_support WHERE shop = '".$store_shop."'";
$result 			= $conn->query($fetch_record);
$row 				= $result->fetch_assoc();
	if (empty($row)) {
		
		$sqlquery = "INSERT INTO 
						product_tabs_support 
						(`shop`, `mail`, `message`) VALUES 
		    			('".$store_shop."','" . $user_email . "', '".$your_message."')";
	} else {
			$sqlquery = "UPDATE product_tabs_support SET mail ='" . $user_email . "', message = '".$your_message."' ";

	}
	
	if ($sqlquery) {
		if ($conn->query($sqlquery) === TRUE) {
			$status =  "Settings Save Successfully";
		} else {
			$status =  "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	echo $status;
	
?>