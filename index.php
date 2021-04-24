
<?php
$title= "Home";
//header file
  require_once('template/header.php');
  //config file
  require_once('config/app.php');
  //db file
  require_once('config/db.php');
 
 

 
 ?>
 
 <!-- main Html content-->
<main class="showcase">

<!-- main showcase section-->
<section class="flex-showcase">

 <div class="content-showcase">
 <h1>Start Writing <br> Your <br> Next Great Story </h1>
 <p>Create better designs, user <br> experiences, and showcase your <br> application in style with — Tails.  </p>
 <a href="<?php echo $config['App_Url'] ?>contact.php" class="btn-showcase">Write Now</a>
 </div>
 
  <div class="img-showcase">
 <img src="img/hero-character.png">
 </div>
 
</section>

   <div class="last"> 
 
  <h3>See what others are saying </h3>
   </div>
  


<!-- post showcase section -->
   
  <?php $messages= $mysqli->query("select * from message order by created_at desc")->fetch_all(MYSQLI_ASSOC)?>
  
<div class="container-showcase">
<?php foreach($messages as $message): ?>
<section class="card" data-aos="fade-down">
<img src="<?php echo $config['App_Url'].$message['image'] ?>">
<div>
<h3><?php echo $message['username'] ?></h3>
<p><?php echo $message['body'] ?></p>
<a class="btn-show" href="<?php echo $config['App_Url'] ?>message.php?id=<?php echo $message['id']; ?>">Open</a>
</div>
</section>
<?php endforeach; ?>

</div>
</main>





<!--footer file-->
<?php
 require_once('template/footer.php')
 ?>

