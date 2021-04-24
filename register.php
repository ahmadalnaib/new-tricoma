<?php
$title= "Register";
//header file
 require_once('template/header.php'); 
 //db file
  require_once('config/db.php'); 
  
  //check the user if login with session
  if(isset($_SEESION['logged_id'])){
	  header('location:index.php');
  }
  
  
  //for the err arry
  $errors=[];
  
  //for the value in form
  $email='';
  $name='';
  
 
  if($_SERVER['REQUEST_METHOD']== 'POST'){
	  $email=mysqli_real_escape_string($mysqli,$_POST['email']);
	   $name=mysqli_real_escape_string($mysqli,$_POST['name']);
	   $password=mysqli_real_escape_string($mysqli,$_POST['password']);
	  $password_confirm=mysqli_real_escape_string($mysqli,$_POST['password_confirm']);
	  
	  
	  if(empty($email)){
		  array_push($errors,"email is required");
	  }
	  if(empty($name)){
		  array_push($errors,"name is required");
	  }
	  if(empty($password)){
		  array_push($errors,"email is required");
	  }
	 
	  
	  if($password !== $password_confirm)
	  {
		   array_push($errors,"password not match");
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
		  $query="INSERT INTO users(email,name,password)
		          values('$email','$name','$password')";
		  $mysqli->query($query);
		  
		  //session for user login
		  $_SEESION['logged_in']=true;
		  //last user id register in system
		  $_SEESION['user_id']=$mysqli->insert_id;
		  $_SEESION['user_name']=$name;
		  //msg after login
		  $_SEESION['success_message']="Welcome , $name 🤖";
		  
		  header("location:index.php");
	  }
	  
	  
  }
 
    
 
 ?>
 
 
 
 <!--Html contact-form -->
 <div class="contact-container">
 
  <!--img -->
 <div class="contact-img">
 <span>Work smarter</span>
 <p class="lead">Features to help you work smarter </p>
 

 </div>
 
   <!--form -->
 <div class="contact-content">
 
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="form" class="form" enctype="multipart/form-data">


<?php include"template/errors.php"?>

 <div class="form-control">
 <label for="email">Email</label>
 <input type="text" name="email" value="<?php echo $email ?>"  id="email" placeholder="Enter email">
 </div>
 
 <div class="form-control">
 <label for="name">Name</label>
 <input type="text" name="name" value="<?php echo $name ?>"  id="name" placeholder="Enter name">
 </div>
 
  
 <div class="form-control">
 <label for="password">Password</label>
 <input type="text" name="password"  id="name" placeholder="Enter password">
 
 </div>
 
  <div class="form-control">
 <label for="password_confirm">Confirm Password</label>
 <input type="text" name="password_confirm"  id="password_confirm" placeholder="confirm password">
 
 </div>
 

 
 <button class="btn">Submit</button>
<span class="register-dwon">  Signup or, if you have an account you can <a href="#">sign in</a></span>
 </form>

 </div>

 </div>
 


<?php require_once('template/footer.php') ?>

