<?php 
include 'conf.php';
$store_shop         = $_POST['shop'];
$fetch_record 		= "SELECT * FROM product_tabs WHERE shop = '".$store_shop."'";
$result 			= $conn->query($fetch_record);
$row 				= $result->fetch_assoc();
$tabs_design_json   = json_encode(array(
						  'tab_layout'          	=> $_POST['tab_layout'],
			              'tab_width_style' 		=> $_POST['tab_width_style'],
			              'tab_width_range' 		=> $_POST['tab_width_range'],
			              'tab_transition' 			=> $_POST['tab_transition'],
			              'tab_bgcolor'    			=> $_POST['tab_bgcolor'],
			              'content_height_range'	=> $_POST['content_height_range'],
			              'content_bgcolor' 		=>  $_POST['content_bgcolor'] ,
			              'border_width_range'  	=> $_POST['border_width_range'] ,
			              'border_redius_range' 	=> $_POST['border_redius_range'] ,
			              'border_color'        	=> $_POST['border_color'],
			              'tab_font_weight'      	=> $_POST['tab_font_weight'],
			              'tab_font_style'          => $_POST['tab_font_style'],
			              'tab_font_decoration'     => $_POST['tab_font_decoration'],
			              'tab_font_family'         => $_POST['tab_font_family'],
			              'tab_txt_color'           => $_POST['tab_txt_color'],
			              'content_font_weight'      => $_POST['content_font_weight'],
			              'content_font_style'       => $_POST['content_font_style'],
			              'content_font_decoration'  => $_POST['content_font_decoration'],
			              'content_font_family'      => $_POST['content_font_family'],
			              'content_txt_color'        => $_POST['content_txt_color'],
			              'gradient_color'           => $_POST['gradient_color']
					));

	if (empty($row)) {
		
		$sqlquery = "INSERT INTO 
						product_tabs 
						(`tab_design_json`) VALUES 
		    			('" . $tabs_design_json . "')";
	} else {
			$sqlquery = "UPDATE product_tabs SET tab_design_json ='" . $tabs_design_json . "' WHERE shop ='$store_shop'";

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