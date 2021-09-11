<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
<h1>Hello, <?php echo $_SESSION['username']; ?></h1>
     <form action="question-upload.php" method="post">
     	<h2>QUESTION UPLOAD</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>


          <label>Question</label>
          <?php if (isset($_GET['content'])) { ?>
               <!-- <textarea name="content" id="60" cols="30" rows="10" placeholder="Your question here..."> <?php echo $_GET['content']; ?></textarea> -->
               <textarea name="content" id="60" cols="30" rows="10" placeholder="Your question here..."></textarea>
          <?php }else{ ?>
               <!-- <input type="text" name="content" placeholder="Content"><br> -->
               <textarea name="content" id="60" cols="30" rows="10"></textarea>
          <?php }?>
     	<br>
     	<button type="submit">Upload </button>
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