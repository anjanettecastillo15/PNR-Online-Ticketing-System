<!DOCTYPE html>
<html>
<head>
   
    <link rel = "stylesheet" href="navbar.css"> 
    <title>PNR Online Ticketing | Log in</title>
    <link rel="stylesheet" href="style.css">
</head>
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
    /* #back{
        background: url(train.jpg); 
        background-repeat:no-repeat;
        background-size:100%;
        background-size:cover;
        left:0%;
        right:0%;
    } */
    </style>
<body  style='background: url(train.jpg); background-repeat:no-repeat; background-size:100% 100%; background-size: cover;'>
<!-- <div id="back"> -->
<header>
  
   
<img src="PNR_logo.png" id="logo">
    <h1 style="left: 4%;"> <span> PNR ONLINE TICKETING SYSTEM</span></h1>
 
    <nav>

        <ul>
            <li><a href="signup.php">Don't have an account? Sign up here</a><li>
        </ul>
    </nav>

</header>   
    <div id="box">
    <img src="PNR_logo.png" id="logo">
    <img src="log.jpg" id="log">
        <form method="post">
        <div style="font-size: 30px; margin: 10px; color: black; font-weight:bold;text-align:center">Log in</div>
            <p>Username</p>
            <input type="text" name="user_name"  placeholder="Enter username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter password">

            <input type="submit" value="Log in">
        </form>
    </div>
    <!-- </div> -->
</body>

</html>

<?php
session_start();

include("indexconnect.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $pass = MD5($password);

    if(!empty($user_name)&& !empty($pass) && !is_numeric($user_name))
    {
        
        //read from database
        $query = "select * from users where user_name = '$user_name' limit 1"; 
        
        $result = mysqli_query($conn, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] === $pass){

                    $_SESSION['user_name'] = $user_data['user_name'];
                    header("Location: index.php");
                    die;
                }
            }
        }
        echo"<div id=girl>";
        echo "Wrong username or password!";
        echo"</div>";
    }
    else{
        echo"<div id=girl>";
        echo "Please enter valid information!";
        echo"</div>";
    }
}
?>

