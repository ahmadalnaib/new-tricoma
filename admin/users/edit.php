

<?php
$title= "edit user";
include __DIR__ . '/../template/header.php';



 //check the id 
 if(!isset($_GET['id']) || !$_GET['id'])
 {
	 die('Missing id parameter');
 }


  
  
 //get all the user info
 $stetment=$mysqli->prepare('select * from users where id = ? limit 1');
 $stetment->bind_param('i',$userId);
 $userId=$_GET['id'];
 $stetment->execute();
 $user=$stetment->get_result()->fetch_assoc();
 
 $name=$user['name'];
 $email=$user['email'];
 $role=$user['role'];
//for the err arry
  $errors=[];

if($_SERVER['REQUEST_METHOD']=='POST'){
	
	 if(empty($_POST['email'])){
		  array_push($errors,"email is required");
	  }
	  if(empty($_POST['name'])){
		  array_push($errors,"name is required");
	  }
	  
	   if(empty($POST['role'])){
		  array_push($errors,"role is required");
	  }
	  
	    if(!count($errors)){
	
	$stetment=$mysqli->prepare('update users set name =?, email=?,role=?,password=? where id = ?');
	$stetment->bind_param('ssssi',$dbName,$dbEmail,$dbRole,$dbPassword,$dbId);
	$dbName=$_POST['name'];
	$dbEmail=$_POST['email'];
	$dbRole=$_POST['role'];
	$_POST['password']? $dbPassword=password_hash($_POST['password'],PASSWORD_DEFAULT) :$dbPassword=$user['password'] ;
	$dbId=$_GET['id'];
	
	$stetment->execute();
	
	if($stetment->error)
	{
		array_push($errors,$stetment->error);
	}else{
		header("Location: users/index.php");
	}
	
		}
	
}
 
 
?>
 <!--Html contact-form -->
 <div class="contact-container">
 
 
 
   <!--form -->
 <div class="contact-content">
 
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="form" class="form" enctype="multipart/form-data">

<?php include"../template/errors.php"?>

 <div class="form-control">
 <label for="email">Email</label>
 <input type="text" name="email" value="<?php echo $email ?>"   id="email" placeholder="Enter email">
 </div>
 
 <div class="form-control">
 <label for="name">Name</label>
 <input type="text" name="name" value="<?php echo $name ?>"   id="name" placeholder="Enter name">
 </div>
 
  
 <div class="form-control">
 <label for="password">Password</label>
 <input type="text" name="password"  id="name"  placeholder="Enter password">
 
 </div>
 
 <div class="form-control"">
 <label for="role">Role</label>
 <select class="" name="role" id="role">
  <option >Choose..</option>
 <option value="user" <?php if($role=='user') echo 'selected' ?>>User</option>
  <option value="admin" <?php if($role=='admin') echo 'selected' ?>>Admin</option>
 </select>
 </div>
 
 
 

 
 <button class="btn">Edit</button>

 </form>

 </div>

 </div>
 
 
 <?php include __DIR__ . '/../template/footer.php';?>