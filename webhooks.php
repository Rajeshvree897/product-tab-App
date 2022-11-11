<?php

header('Content-Type: text/html; charset=utf-8');
http_response_code(200);
header('HTTP/1.0 200 OK');
header("Status: 200 OK");

require __DIR__ . '/conf.php';

$shop = $_REQUEST['shop'];
$webhookType = $_REQUEST['webhookType'];

$hmac_header = $_SERVER['HTTP_X_SHOPIFY_HMAC_SHA256'];
$productData = file_get_contents('php://input');
$verified = verify_webhook($productData, $hmac_header);

function verify_webhook($data, $hmac_header)
{
    $calculated_hmac = base64_encode(hash_hmac('sha256', $data, SHOPIFY_APP_SHARED_SECRET, true));
    return ($hmac_header == $calculated_hmac);
}
$hmac_header = $_SERVER['HTTP_X_SHOPIFY_HMAC_SHA256'];
$data = file_get_contents('php://input'); // get webhook data
// $data = str_replace("'","||",$data);

// file_put_contents('test1.text', $data);


$curl = SHOPIFY_SITE_URL . 'curl_webhooks.php';
$details = array(
    'order' => json_decode($data),
    'shop' => $shop,
    'webhookType' => $webhookType,
);

$details = json_encode($details);
$fields = array('data' => $details);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $curl);
curl_setopt($ch, CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 1); //timeout in seconds
$result = curl_exec($ch);

curl_close($ch);
return;
