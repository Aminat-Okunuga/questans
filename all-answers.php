<?php 
session_start();
include_once 'db_conn.php';

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    $user_id = $_SESSION['id'];
    if(isset($_GET['question_id'])){
        $question_id = $_GET['question_id'];
        $_SESSION['question_id'] = $question_id;
        // exit();
   }
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
    <div style="margin-top: 5px; color: #fff">
    <p><a href="logout.php">Logout</a></p>
        <h2>Hello, <?php echo $_SESSION['username']; ?></h2>
       
    </div>
    <div>
        <table border="4">
            <tr>
                <th>Question ID</th>
                <th>Question</th>
                <th>Answers</th>
            </tr>
            <?php
            $sql = mysqli_query($conn, "SELECT answers.answer, users.username, questions.question, answers.question_id, questions.user_id
            FROM answers 
            INNER JOIN users ON answers.user_id = users.id
            INNER JOIN questions ON answers.question_id = questions.id
            ");

            while ($result = mysqli_fetch_array($sql)) {?>
            <tr>
                <td><?php echo $result['question_id'];?></td>
                <td><?php echo $result['question'];?></td>
                <td>
                    <ul type="none">
                        <li><?php echo $result['answer'] ?></li>
                        <li><small><center><?php echo "Answered by: ". $result['username'] ?><center></small></li>
                    </ul>
                </td>
            </tr>
            <?php } ?>
        </table>

    </div>
       <br><br>
    <div>
        <button><a style="color: #fff; text-decoration: none" href="ask-question.php">Upload Question</a></button>
        <button><a style="color: #fff; text-decoration: none" href="dashboard.php">Dashboard</a></button>
    </div>
</body>
</html>
