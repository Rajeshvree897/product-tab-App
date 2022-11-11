<?php
header("Access-Control-Allow-Origin: *");
ini_set('display_errors', 0);

// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require 'vendor/autoload.php';
use phpish\shopify;
require 'conf.php';
if (!empty($_GET['shop'])) {
  $shop = $_REQUEST['shop'];
} else {
  $shop = $_REQUEST['shop'];  
}
$config_table_name = CONFIG_TABLE;
$sql = "SELECT * FROM $config_table_name WHERE shop ='$shop' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $oauth_token =  $row['oauth_token'];
  }
} else {
  die("Error : No access token found");
}

$shopify = shopify\client($shop, SHOPIFY_APP_API_KEY, $oauth_token);
// $all_customer = $shopify('GET /admin/api/2020-07/customers.json');
