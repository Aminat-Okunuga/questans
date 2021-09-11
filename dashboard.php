<?php 
session_start();
include_once 'model/db_conn.php';

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

    $user_id = $_SESSION['id'];
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <div><a href="logout.php">Logout</a></div>
    <div style="margin-top: 5px; color: #fff">
        <h2>Hello, <?php echo $_SESSION['username']; ?></h2>
    </div>
    <div>
        <table border="4">
            <tr>
                <th>Question</th>
                <th>User</th>
                <th>Action</th>
            </tr>
            <?php
            $sql = mysqli_query($conn, "SELECT users.username, questions.id, questions.question 
            FROM users 
            JOIN questions ON users.id = questions.user_id");
            $rows = mysqli_num_rows($sql);
            while ($result = mysqli_fetch_array($sql)) {?>
                
            <tr>
                <td><?php echo $result['question'];?></td>
                <td style="text-transform: capitalize"><?php echo $result['username'];?></td>
                <td><?php if($_SESSION['username'] !== $result['username']){?>
                    <button><a style="color: #fff; text-decoration: none" href="answer.php?question_id=<?php echo $result['id'] ?>">Answer It</a></button>
                     <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </table>

    </div>
       <br><br>
    <div>
        <button style="background:#3c3a3a; float: left"><a style="color: #fff; text-decoration: none" href="ask-question.php">Upload Question</a></button>
        <button style="background:#3c3a3a; float: left"><a style="color: #fff; text-decoration: none" href="all-answers.php">View Answers</a></button>
    
        </div>
</body>
</html>
