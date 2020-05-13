<?php 

$servername = "localhost";

$username = "aweso_wooapp";

$password = "aweso_wooapp";

$dbname = "aweso_wooapp";



// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

} 



?>