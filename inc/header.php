<?php 
session_start();
$siteurl = "https://app.infinityproject.in/";
$access_token = $_SESSION['access_token'] ;
$shop = $_SESSION['shop'];
include('config.php')
?>
<!DOCTYPE html>

<html>

<head>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo $siteurl ?>inc/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<title>My App </title>
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img class="w-25" src="<?php echo $siteurl ?>appdata/img/dummylogo.jpg"></a>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
      
      <a href="#" class="btn spwh">Add Design</a>
      <a href="#" class="btn spwh">Add Product</a>
      <a href="#" class="btn spblue">Help App</a>
  </div>
</nav>

<div class='container mt-5'>