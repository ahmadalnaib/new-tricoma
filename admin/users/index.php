<?php
$title= "users";
include __DIR__ . '/../template/header.php';
 
 


  
  //check for submit delete;
  if($_SERVER['REQUEST_METHOD']=='POST'){
	  $id=htmlentities($_POST['delete_id']);
	   $statment=$mysqli->prepare("delete from users where id= ?");
	   $statment->bind_param('i',$id);
	   $id=$_POST['delete_id'];
	   $statment->execute();
	  
	   header("Location: index.php");
	   die();
	  
  }
  
 //get all the users 
  $users=$mysqli->query("select * from users order by created_at desc")->fetch_all(MYSQLI_ASSOC);
  


 ?>
 
 <?php if(isset($_SESSION['logged_in'])): ?>
 <div class="table-main">

 
 <table id="message">
 <thead>
 <tr>
   <th>#</th>
   <th>name</th>
   <th>email</th>
   <th>actions</th>
 </tr>
 </thead>
 
 <tbody>
 <?php foreach($users as $user): ?>

 <tr>
 <td> <?php echo $user['id']; ?></td>
 <td> <?php echo $user['name']; ?></td>
 <td> <?php echo $user['email']; ?></td>
 
   <td>
     <form onsubmit="return confirm('Are you sure')" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	 <input type="hidden" name="delete_id" value="<?php echo $user['id'] ;?>">
	  <input type="submit" name="delete" value="Delete" class="btn-danger">
	 </form>
	
	</td>
	
 </tr>

 <?php endforeach; ?>
 </body>
 
 </table>
 </div>
 
   <?php else:  ?>
<?php die('not found 😋') ?>

<?php endif ?>
 
<?php include __DIR__ . '/../template/footer.php';?>