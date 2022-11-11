<?php
header("Access-Control-Allow-Origin: *");
if(!defined('SHOPIFY_APP_API_KEY')){
	define('SHOPIFY_APP_API_KEY', '50f110c93e5947713e666fb91119d5fc');
}
if(!defined('SHOPIFY_APP_SHARED_SECRET')){
	define('SHOPIFY_APP_SHARED_SECRET', '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');
}
// SHOPIFY_SITE_URL = your App main directory Url
if(!defined('SHOPIFY_SITE_URL')){
	define('SHOPIFY_SITE_URL', 'https://appsworld.website/sapp/t1/product_tab_app/');
}

// PRFX = prefix for variables accordingly app name
if(!defined('PRFX')){
	define('PRFX', 'dzx');
}
// tables
if(!defined('CONFIG_TABLE')){
	define('CONFIG_TABLE', 'product_tab_app_credentials');
}
// Create connection
$conn = mysqli_connect('localhost', 'appsroko_t1usr', 'G-W]s;?Z6zHK', 'appsroko_sappt1');
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$shopify_api_version = '2021-07';
?>