
<?php
$title= "Message";
//header file
  require_once('template/header.php');
  //config file
  require_once('config/app.php');
  //db file
  require_once('config/db.php');
 

 
 ?>
 
<div class="main-show-message">

	<?php
	$id=$_GET['id'];
	 $message= $mysqli->query("select * from message where id =".$id)->fetch_assoc();
	
	?>
	

<div class="flex-message">

<div class="content-message">
<p><?php echo $message['body'] ?> </p>

</div>


<div class="info-message">
<img src="<?php echo $config['App_Url'].$message['image'] ?>">
 <h2 class="username"><?php echo $message['username'] ?><h2>
 <p><?php echo $message['email'] ?></p>
<span><?php echo $message['created_at'] ?></span>


</div>

</div>

<a class="btn" href="<?php echo $config['App_Url'] ?>">Back</a>

</div>





<!--footer file-->
<?php
 require_once('template/footer.php')
 ?>

