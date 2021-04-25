<?php
session_start();
if(isset($_SESSION['logged_in'])){
	$_SESSION=[];
	$_SESSION['success_message']="We well miss you, Back soon 😥 ";
	header("location:index.php");
	die();
}