
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
 <h1>Beginnen Sie mit<br> dem Schreiben <br> Ihre Kommentar </h1>
 <p>Jedes Wort bedeutet für uns. </p>
 <a href="<?php echo $config['App_Url'] ?>contact.php" class="btn-showcase">schreibe jetzt</a>
 </div>
 
  <div class="img-showcase">
 <img src="img/hero-character.png">
 </div>
 
</section>

   <div class="last"> 
 
  <h3>Sehen Sie, was andere sagen </h3>
   </div>
  


<!-- post showcase section -->
   
  <?php $messages= $mysqli->query("select * from message order by created_at desc")->fetch_all(MYSQLI_ASSOC)?>
  
<div class="container-showcase">
<?php foreach($messages as $message): ?>
<section class="card" data-aos="fade-down">
<img src="<?php echo $config['App_Url'].$message['image'] ?>">
<div>
<h3><?php echo $message['username'] ?></h3>
<p class="line-clamp"><?php echo $message['body'] ?></p>

<a class="btn-show" href="<?php echo $config['App_Url'] ?>message.php?id=<?php echo $message['id']; ?>">Weiterlesen</a>

</div>
</section>
<?php endforeach; ?>

</div>
</main>





<!--footer file-->
<?php
 require_once('template/footer.php')
 ?>

