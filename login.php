<?php
$title= "Register";
//header file
 require_once('template/header.php'); 
 //db file
  require_once('config/db.php'); 
  
  //check the user if login with session
  if(isset($_SESSION['logged_in'])){
	  header('location:index.php');
  }
  
  
  //for the err arry
  $errors=[];
  
  //for the value in form
  $email='';

  
 
  if($_SERVER['REQUEST_METHOD']== 'POST'){
	  $email=mysqli_real_escape_string($mysqli,$_POST['email']);
	   $password=mysqli_real_escape_string($mysqli,$_POST['password']);
	 
	  
	  
	  if(empty($email)){
		  array_push($errors,"email is required");
	  }
	
	  if(empty($password)){
		  array_push($errors,"password is required");
	  }
	 
	  
	 
	  
	  
	  //query if the user is exists;
	  if(!count($errors)){
	  $userExists=$mysqli->query("select id, email, password,name from users where email='$email' limit 1");
	  
	  if(!$userExists->num_rows){
		   array_push($errors," oops! email not registered 😲");
	  } else{
		    
			$user=$userExists->fetch_assoc();
			if(password_verify($password,$user['password']))
			{
				$_SESSION['logged_in']=true;
				$_SESSION['user_id']=$user['id'];
				$_SESSION['user_name']=$user['name'];
				$_SESSION['success_message']="hey welecome Back $user[name] 🎉🎉";
				header('location:index.php');
				die();
			} else{
				 array_push($errors,"email or password not right 🤨");
			}
		  
	  }
	  
	  }
	  
	  
  }
 
    
 
 ?>
 
 
 
 <!--Html contact-form -->
 <div class="contact-container">
 
  <!--img -->
 <div class="contact-img">
 <span>Building Businesses</span>
 <p class="lead">Changing The Way People Do Business.</p>
 

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
 <label for="password">Password</label>
 <input type="text" name="password"  id="name" placeholder="Enter password">
 
 </div>
 
 

 
 <button class="btn">Welcome Back</button>
<span class="register-dwon"> Don't have an account? <a href="register.php">sign up here</a></span>
 </form>

 </div>

 </div>
 


<?php require_once('template/footer.php') ?>

