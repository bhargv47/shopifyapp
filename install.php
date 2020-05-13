<?php



// Set variables for our request

$shop = $_GET['shop'];

$api_key = "005a2d53dc806e82b277b2533d50e3a3";

$scopes = "read_orders,write_products";

$redirect_uri = "https://awesomedeal.store/generate_token.php";



// Build install/approval URL to redirect to

$install_url = "https://" . $shop . "/admin/oauth/authorize?i=1&client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);



// Redirect

header("Location: " . $install_url);

die();