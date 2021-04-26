<!--config file--php-->
<?php
 //session
session_start();



//config file
include __DIR__ . '/../../config/app.php';
//dbfile
include __DIR__ . '/../../config/db.php';
?>

<!--html-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo $config['App_Url'] ?>admin/css/style.css">
   
  <title><?php echo $config['App_Name'] .  " | "  . $title ?> </title>
</head>
<body>


<div class="container">