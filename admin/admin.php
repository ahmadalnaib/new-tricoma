<?php
$title="admin";
require_once('template/header.php');

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
	 
	  
	   $users= $mysqli->query("select * from users order by created_at desc")
	   ->fetch_all(MYSQLI_ASSOC);
	 
	   foreach($users as $user) {
         
        if(($user['email'] == $email) &&
            ($user['password'] == $password)) {
				$_SESSION['logged_in']=true;
				$_SESSION['user_id']=$user['id'];
				$_SESSION['user_name']=$user['name'];
				$_SESSION['success_message']="hey welecome Back $user[name] 🎉🎉";
				header('location:index.php');
				die();
               
        }
        else {
			 array_push($errors,"email or password not right 🤨");
           /* echo "<script language='javascript'>";
            echo "alert('WRONG INFORMATION')";
            echo "</script>";
            die();
			*/
        }
    }
	  
	  //
	  
	  
  }
 
    
 
 ?>
 
 
 
 <!--Html contact-form -->
 <div class="contact-container">
 
  <!--img -->

 
   <!--form -->
 <div class="contact-content">
 
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="form" class="form" enctype="multipart/form-data">


<?php include"template/errors.php"?>

 <div class="form-control">
 <label for="email">Email</label>
 <input type="text" name="email" value="<?php echo $email ?>"  id="email" placeholder="Enter email">
 </div>
 
  
 <div class="form-control">
 <label for="password">Passwort</label>
 <input type="text" name="password"  id="name" placeholder="Enter Passwort">
 
 </div>
 
 

 
 <button class="btn">anmelden</button>

 </form>

 </div>

 </div>
 