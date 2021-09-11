<?php 
session_start(); 
include_once 'model/db_conn.php';

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

    $user_id = $_SESSION['id'];
}

if (isset($_POST['content'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$content = validate($_POST['content']);


	if (empty($content)) {
		header("Location: ask-question.php?error=Question Content is required&$content");
	    exit();
	}

	else{
        //    $sql2 = "INSERT INTO users(user_name, password, name) VALUES('$uname', '$pass', '$name')";
           $sql2 = "INSERT INTO questions(question, user_id) VALUES('$content', $user_id)";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: dashboard.php?success=Your question has been uploaded successfully");
	         exit();
           }else {
	           	header("Location: ask-question.php?error=unknown error occurred&$content");
		        exit();
           }
		}
	
}else{
	header("Location: dashboard.php");
	exit();
}