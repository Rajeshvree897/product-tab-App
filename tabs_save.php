<?php 
include 'conf.php';
$data =  json_decode($_POST['tabs_data'], true);
$tabs_array         = $data['tab_json'];
$tabs_content_array = $data['tab_con_json'];
$store_shop         = $data['store_shop'];
$fetch_record 		= "SELECT * FROM product_tabs WHERE shop = '".$store_shop."'";
$result 			= $conn->query($fetch_record);
$row 				= $result->fetch_assoc();
$tabs_json = json_encode($tabs_array);
$tabs_content_json = json_encode($tabs_content_array);

	if (empty($row)) {
		
		$sqlquery = "INSERT INTO 
						product_tabs 
						(`shop`, `tabs_json`, `tabs_content_json`) VALUES 
		    			('".$store_shop."','" . $tabs_json . "', '".$tabs_content_json."')";
	} else {
			$sqlquery = "UPDATE product_tabs SET tabs_json ='" . $tabs_json . "', tabs_content_json = '".$tabs_content_json."' ";

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