 <?php
 
  $conn=[
  "host"=>"localhost",
  "user"=>"root",
  "pass"=>"",
  "db"=>"tricoma"
  ];
 
 //connect to sql
 $mysqli=new mysqli($conn['host'],
                    $conn['user'],
					$conn['pass'],
					$conn['db']);
 
 if($mysqli->connect_error){
	 die("Error connecting to database" . $mysqli->connect_error);
 }
 
 
 
