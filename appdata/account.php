<?php include('../inc/header.php'); ?>




<?php
error_reporting(0);
require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;
use Automattic\WooCommerce\HttpClient\HttpClientException;
$woocommerce = new Client($_POST['url'], $_POST['key'], $_POST['secret'],
    [
           'wp_api' => true, 'version' => 'wc/v1',
        
    ]
);
try {
$products = $woocommerce->get('products');

//you can set any date which you want
           
}
catch(HttpClientException $e) {
$e->getMessage(); // Error message.
$e->getRequest(); // Last request data.
$e->getResponse(); // Last response data.
}
if ($products !="") {
 $sql = "UPDATE `access` SET `WebsiteURL`='".$_POST['url']."',`ConsumerKey`='".$_POST['key']."',`ConsumerSecret`='".$_POST['secret']."',`Status`='1' WHERE store = '".$shop."'";


$result = $conn->query($sql);



echo '<div class="alert alert-success" role="alert">Redirecting...</div>';
}else
{
		echo '<div class="alert alert-danger" role="alert">Your Website URL, Consumer key & Consumer secret is Not Valid.</div>';
	}
?>










<?php include('../inc/footer.php'); ?>