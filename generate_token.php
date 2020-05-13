<?php



// Get our helper functions

require_once("inc/functions.php");

include('inc/config.php');



// Set variables for our request

$api_key = "005a2d53dc806e82b277b2533d50e3a3";

$shared_secret = "1f73d04f8b0c2233fe3f9c4a699c378e";

$params = $_GET; // Retrieve all request parameters

$hmac = $_GET['hmac']; // Retrieve HMAC request parameter

$params = array_diff_key($params, array('hmac' => '')); // Remove hmac from params

ksort($params); // Sort params lexographically



$computed_hmac = hash_hmac('sha256', http_build_query($params), $shared_secret);





$query = array(

  "client_id" => $api_key, // Your API key

  "client_secret" => $shared_secret, // Your app credentials (secret key)

  "code" => $params['code'] // Grab the access key from the URL

);



// Generate access token URL

$access_token_url = "https://" . $params['shop'] . "/admin/oauth/access_token";



// Configure curl client and execute request

$ch = curl_init();

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_URL, $access_token_url);

curl_setopt($ch, CURLOPT_POST, count($query));

curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($query));

$result = curl_exec($ch);

curl_close($ch);



// Store the access token

$result = json_decode($result, true);

$shop_url = explode(".",$_GET['shop']);

$access_token = $result['access_token'];

$shop = $shop_url['0'];




$sql = "SELECT * FROM access WHERE store IN ('".$shop."')";

$result = $conn->query($sql);

$row = $result->fetch_assoc();



if ($result->num_rows > 0) {


	if ($row['access_token'] == $access_token) { 
		session_start();
		$_SESSION['access_token'] = $access_token;
		$_SESSION['shop'] = $shop;
		header("Location: appdata/form.php");
	}else {
		session_start();
		$_SESSION['access_token'] = $access_token;
		$_SESSION['shop'] = $shop;
		$sql = "UPDATE `access` SET `access_token`='".$access_token."' WHERE store = '".$shop."'";
		$result = $conn->query($sql);
		header("Location: https://".$shop.".myshopify.com/admin/apps/woo-product-import");
	}


}

else {

	session_start();

	$_SESSION['access_token'] = $access_token;

	$_SESSION['shop'] = $shop;

	$sql = "INSERT INTO access (store, access_token) VALUES ('".$shop."', '".$access_token."')";

	if ($conn->query($sql) === TRUE) { } else {	}

	header("Location: https://".$shop.".myshopify.com/admin/apps/woo-product-import");

}
