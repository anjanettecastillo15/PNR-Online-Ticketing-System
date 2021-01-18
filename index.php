<?php

session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
<body>
    <a href="logout.php"> Log out </a>
    <h1>FRONT PAGE</h1>
    <br>
    Hello, <?php echo $user_data['user_name'] ?>
</body>
</head>
</html>
