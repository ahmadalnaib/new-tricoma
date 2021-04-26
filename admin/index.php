<?php 
$title="Area 51 👽";
require_once('template/header.php');?>
<?php if(isset($_SESSION['logged_in'])): ?>


<?php
//get all the users 
  $users=$mysqli->query("select * from users order by created_at desc")->fetch_all(MYSQLI_ASSOC);
  //get all the comments
  $messages=$mysqli->query("select * from message order by created_at desc")->fetch_all(MYSQLI_ASSOC);
  
?>
<div class="main-admin">
<div class="users">
<div class="users-img">
<img src="img/productivity.png">
</div>

<div class="users-content">
<p>Users:  <?php echo count($users) ?> </p>
</div>
</div>

<div class="comments">
<div class="comment-img">
<img src="img/settings.png">
</div>
<div class="comment-content">
<p>Kommentare: <?php echo count($messages) ?> </p>
</div>
</div>

</div>



<?php else:  ?>
<?php header('location:admin.php') ?>

<?php endif ?>
<?php require_once('template/footer.php');?>