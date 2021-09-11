<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
     if(isset($_GET['question_id'])){
          $question_id = $_GET['question_id'];
          $_SESSION['question_id'] = $question_id;
          // exit();
     }
     

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>QuestAns | ANSWER PAGE</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
<h1>Hello, <?php echo $_SESSION['username']; ?></h1>
     <form action="answer-upload.php" method="post">
     	<h2>ANSWER UPLOAD</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>


          <label>Answer</label>
          <?php if (isset($_GET['content'])) { ?>
               <textarea name="content" id="60" cols="30" rows="10" placeholder="Your question here..."></textarea>
          <?php }else{ ?>
               <textarea name="content" id="60" cols="30" rows="10"></textarea>
          <?php }?>
     	<br>
     	<button type="submit">Upload Answer</button>
         
          <button style="background:#3c3a3a; float: left"><a style="color: #fff; text-decoration: none" href="dashboard.php">Back</a></button>
   
     </form>
     <br><br>

     
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>