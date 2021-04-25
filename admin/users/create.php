

<?php
$title= "create user";
include __DIR__ . '/../template/header.php';





//for the err arry
  $errors=[];
  
  //for the value in form
  $email='';
  $name='';
  
  
 
  if($_SERVER['REQUEST_METHOD']== 'POST'){
	  $email=mysqli_real_escape_string($mysqli,$_POST['email']);
	   $name=mysqli_real_escape_string($mysqli,$_POST['name']);
	   $password=mysqli_real_escape_string($mysqli,$_POST['password']);
	  $role=mysqli_real_escape_string($mysqli,$_POST['role']);
	  
	  
	  if(empty($email)){
		  array_push($errors,"email is required");
	  }
	  if(empty($name)){
		  array_push($errors,"name is required");
	  }
	  if(empty($password)){
		  array_push($errors,"password is required");
	  }
	  
	   if(empty($role)){
		  array_push($errors,"role is required");
	  }
	 
	 
	  
	  
	  //query if the user is exists;
	  if(!count($errors)){
	  $userExists=$mysqli->query("select id, email from users where email='$email' limit 1");
	  
	  if($userExists->num_rows){
		   array_push($errors,"email already registered");
	  }
	  }
	  
	  //password hash
	  if(!count($errors)){
		  $password=password_hash($password,PASSWORD_DEFAULT);
		  
		  //INSERT USER
		  $query="INSERT INTO users(email,name,password,role)
		          values('$email','$name','$password','$role')";
		  $mysqli->query($query);
		  
		  //check if there errors in query
		  if($mysqli->error){
			  array_push($error,$mysqli->error);
		  }else{
			   header("location:index.php");
			  
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
 <option value="user">User</option>
  <option value="admin">Admin</option>
 </select>
 </div>
 
 
 

 
 <button class="btn">Create</button>

 </form>

 </div>

 </div>
 
 
 <?php include __DIR__ . '/../template/footer.php';?>