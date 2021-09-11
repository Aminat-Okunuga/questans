<?php 
session_start(); 
include "db_conn.php";

// if (isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_GET['question_id']) ) {

//     $user_id = $_SESSION['id'];
// 	$question_id = $_GET['question_id'];

// 	// echo $user_id ;
// 	// echo $question_id;
// 	exit();  
// }
// if(isset($_GET['question_id'])){
// 	$question_id = $_GET['question_id'];
// 	echo $question_id;
// 	exit();
// }

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

	if(isset($_SESSION['question_id'])){
		 $question_id = $_SESSION['question_id'];
		 $user_id = $_SESSION['id'];
		 echo $question_id;
		 echo $user_id;
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
		header("Location: answer.php?error=Answer Content is required&$content");
	    exit();
	}

	else{
		// echo $question_id;
		// echo $user_id;
		// exit();
        //    $sql2 = "INSERT INTO users(user_name, password, name) VALUES('$uname', '$pass', '$name')";
		// INSERT INTO `answers` (`id`, `answer`, `user_id`, `question_id`, `created_at`) VALUES (NULL, 'this is an answer to question 5', '17', '5', current_timestamp());
           $sql2 = "INSERT INTO answers (answer, user_id, question_id) VALUES('$content', '$user_id', '$question_id')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: dashboard.php?success=Your answer has been uploaded successfully");
	         exit();
		   }
        //    }else {
	    //        	header("Location: answer.php?error=unknown error occurred&$content");
		//         exit();
        //    }
		}
	
}
	}else{
	header("Location: dashboard.php");
	exit();
}