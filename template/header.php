<!--config file--php-->
<?php


//config file
require_once('config/app.php') 
?>

<!--html-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="css/style.css">
  <title><?php echo $config['App_Name'] .  " | "  . $title ?> </title>
</head>
<body>

<nav>
<h2 class="logo">Ahmed</h2>
  <ul>
 <li><a href="#">Login</a></li>
  <li><a class="register" href="register.php">Register</a></li>
</ul>
</nav>


<!-- start container-->
<div class="container">
<!-- session message-->
 <?php include'successmsg.php' ?>