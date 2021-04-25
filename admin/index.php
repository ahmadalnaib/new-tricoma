<?php require_once('template/header.php');?>

<h2>what is that</h2>
<?php
//get all the users 
  $users=$mysqli->query("select * from users order by created_at desc")->fetch_all(MYSQLI_ASSOC);
  
  
?>
<p>Users: <?php echo count($users) ?></p>

<?php require_once('template/footer.php');?>