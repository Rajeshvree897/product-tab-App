<?php
include 'config.php';
$user_id= $_POST['id'];
    $sql = "DELETE FROM `product_tabs_support` WHERE id = '$user_id'";
    $result = $conn->query($sql);
    if($result){
    	$status = true ;
    }else {
        $status = false ;
    }
    echo  $status;
?>