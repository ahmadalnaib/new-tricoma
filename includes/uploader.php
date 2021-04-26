<?php
//db file
  require_once('config/db.php');
  
  
  
//filters inputs
 
 //filter string
 function filterString($input){
	 $input=filter_var(trim($input),FILTER_SANITIZE_STRING);
	 if(empty($input))
	 {
		return false; 
	 }else{
		return $input; 
	 }
 }
 
 //filter email
 function filterEmail($input){
	 $input=filter_var(trim($input),FILTER_SANITIZE_EMAIL);
	 
	 if(filter_var($input,FILTER_VALIDATE_EMAIL)){
		 return $input;
	 }else{
		 return false;
	 }
 }
 
 //upload images
 function canUpload($image)
 {
	 //images types
		$allowed=[
		'jpg'=>'image/jpeg',
		'png'=>'image/png',
		'gif'=>'image/gif',
		];
		
		//images size
		$maxImageSize= 500000;
		$imageSize=$image['size'];
		
		$fileType=mime_content_type($image['tmp_name']);
		
		//check the image type
		if(!in_array($fileType,$allowed)){
			return "image type not allowed!";
		}
		//check the image size
		if($imageSize > $maxImageSize){
			return "image size is not allowed!";
			
		}
		
		//when is everyting is ok
		return true;
		
		
 }
 
 
 
 //errors message var
 $usernameError=$emailError=$imageError=$titleError=$bodyError='';
 
 //show old value when the user have error
 $username=$email=$title=$body='';
 
 
 
 
 
 
 
 
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
	 
	 //validate inputs
	 
	 //validate username
	  $username=filterString($_POST['username']);
	  if(!$username){
		  $usernameError="username is required!";
	  }
	  
	  //validate email
	  $email=filterEmail($_POST['email']);
	  if(!$email){
		  $emailError="email is invalid!";
	  }
	  
	    //validate title
	  $title=filterString($_POST['title']);
	  if(!$title){
		  $titleError="title is required!";
	  }
	  
	  //validate message
	  $body=filterString($_POST['body']);
	  if(!$body){
		  $bodyError="message is required!";
	  }
	  
	 
	 
	 
	 //VALID THE UPLOAD IMAGE
	 if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
		 
		$uploadImage=canUpload($_FILES['image']);
		
		if($uploadImage === true){
			//check the folder
			$uploadDir='uploads';
			if(!is_dir($uploadDir)){
				mkdir($uploadDir);
			}
			
			//upload the image
			$fileName=time().$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],$uploadDir.'/'.$fileName);
			
		} else {
			$imageError=$uploadImage;
		}
		
	 }
	 
	 //check the final errors
	 if(!$usernameError && !$emailError && !$imageError && !$titleError && !$bodyError){
		 
		 $fileName=$uploadDir.'/'.$fileName ;
		 
		
		 $insertMessage="insert into message (username,email,image,title,body)
		                 values('$username','$email','$fileName','$title','$body')";
						 
		 $mysqli->query($insertMessage);	 
		 
		/* $statment=$mysqli->prepare("insert into message
		                (username,email,image,title,body)
		  values(?,?,?,?,?)");
		  $statment->bind_param('sssss',$dbUsername,$dbEmail,$dbImage,$dbTitle,$dbBody);
		  $dbUsername=$username;
		  $dbEmail=$email;
		  $dbImage=$fileName;
		  $dbTitle=$title;
		  $dbBody=$body;
		  $statment->execute();
		  */
		 
		 
		
		 
			   
		 
		
		 header('Location: index.php');
		 
	 }
	 
 }