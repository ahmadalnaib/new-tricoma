<!--config file--php-->
<?php

session_start();
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
<a href="<?php echo  $config['App_Url'] ?>index.php" class="logo"><img src="img/logo.png"></a>
  <ul>
  <?php if(!isset($_SESSION['logged_in'])): ?>
    <li><a href="login.php">Login</a></li>
  <li><a class="register" href="register.php">Register</a></li>
  <?php else :?>
  <li><a href="#"><?php echo $_SESSION['user_name'] ?></a></li>
  <li><a class="register" href="logout.php">Logout</a></li>
  <?php endif ; ?>
</ul>
</nav>


<!-- start container-->
<div class="container">
<!-- session message-->
 <?php include'template/successmsg.php' ;?>