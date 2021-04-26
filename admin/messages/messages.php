<?php
$title= "Messages";
//header file
include __DIR__ . '/../template/header.php';

  
  //check for submit delete;
  if(isset($_POST['delete'])){
	  $id=htmlentities($_POST['delete_id']);
	   $statment=$mysqli->prepare("delete from message where id= ?");
	   $statment->bind_param('i',$id);
	   $statment->execute();
	  
	   header("Location: messages.php");
	   die();
	  
  }
  
 
  $statment=$mysqli->prepare("select * from message order by created_at desc");
  $statment->execute();
  $messages=$statment->get_result()->fetch_all(MYSQLI_ASSOC);



 ?>
 
 <?php if(isset($_SESSION['logged_in'])): ?>
 <div class="table-main">

 
 <table id="message">
 <thead>
 <tr>
   <th>#</th>
   <th>username</th>
   <th>email</th>
   <th>image</th>
   <th>message</th>
   <th>actions</th>
 </tr>
 </thead>
 
 <tbody>
 <?php foreach($messages as $message): ?>

 <tr>
 <td> <?php echo $message['id']; ?></td>
 <td> <?php echo $message['username']; ?></td>
 <td> <?php echo $message['email']; ?></td>
 <td class="img"> <img src="<?php echo $config['App_Url'].$message['image'] ?>"></td>
 <td> <?php echo $message['body']; ?></td>
   <td>
     <form onsubmit="return confirm('Are you sure')" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	 <input type="hidden" name="delete_id" value="<?php echo $message['id'] ;?>">
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