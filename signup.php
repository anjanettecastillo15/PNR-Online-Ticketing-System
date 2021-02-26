<!DOCTYPE html>
<html>
<head>
    <link rel = "stylesheet" href="navbar.css"> 
    <title>PNR Online Ticketing | Sign up</title>
    <link rel="stylesheet" href="style.css">
<body style='background: url(train.jpg); background-repeat:no-repeat; background-size:100% 100%; background-size: cover;'>
<header>
    <img src="PNR_logo.png" id="logo">
    <h1  style="left: 4%;"><span> PNR ONLINE TICKETING SYSTEM</span></h1>
    <nav>
        <ul>
            <li><a href="login.php">Login</a><li>
        </ul>
    </nav>

</header>
<style>
        #girl
    {
    background: rgb(240,248,255,0.8);
    width: 300px;
    margin:auto;
    padding:20px;
    font-family: sans-serif;
    font-weight: bold;
    text-align: center;
    }
    </style>

    

    
    <div id="box">
        <form method="post">
        <img src="log.jpg" id="log">
        <div  style="font-size: 30px; margin: 10px; color: black; font-weight:bold; text-align:center">Sign up</div>
            <p>Username</p>
            <input type="text" name="user_name" placeholder= "Enter username"> 
            <p>Password</p>
            <input type="password" name="password" placeholder= "Enter password"> 
            <p>Confirm Password</p>
            <input type="password" name="cpassword" placeholder= "Enter confirm password">

            <input type="submit" value="Sign up">
        </form>
    </div>
</body>
</head>
</html>

<?php

session_start();

    include("connection.php");
    //include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        //something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $pass = MD5($password);

        if (empty(trim($_POST['user_name']) && trim($_POST['password']))) {
            echo "<div id=girl>";
            echo"Please enter a username and/or password";
            echo "</div>";
        }
        else{
            $checking = mysqli_query($con, "SELECT user_name FROM users where user_name = '$user_name'");
            
            $result = mysqli_num_rows($checking);
            
            if($result>0) {
                echo "<div id=girl>";
                echo "This username is already taken";
                echo "</div>";
            }
        }
        if(empty(trim($_POST['cpassword']))){
            echo "<div id=girl>";
            echo "Please enter a confirm password";
            echo "</div>";
        }
        else{
            $cpassword = $_POST['cpassword'];
            //if(empty($password) && ($password != $cpassword)){
            if($password != $cpassword){
            echo "<div id=girl>";
            echo "Password did not match";
            echo "</div>";
            }
            if(!empty($user_name)&& !empty($pass) && !is_numeric($user_name) && ($password == $cpassword)){
    
                //save to database
                $query = "insert into users (user_name, password, confirm_password) values ('$user_name', '$pass', '$cpassword')"; 
                    
                mysqli_query($con, $query);
        
                header("Location: login.php");
                die;
               
            }
            /*else{
                echo "<div id=girl>";
                echo "Please enter some valid information!";
                echo "</div>";
            }*/
        } 
    }

?>

