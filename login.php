<?php
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){

    //something was posted
    //if(isset($_POST['user_name'])){
        $user_name = $_POST['user_name'];
   // }
  
    $password = $_POST['password'];
    $pass = MD5($password);

    if(!empty($user_name)&& !empty($pass) && !is_numeric($user_name)){

        //read from database
        $query = "select * from users where user_name = '$user_name' limit 1"; 
        
        $result = mysqli_query($con, $query);

        if($result){
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] === $pass){

                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }
        
        echo "Wrong username or password!";
    }
    else{

        echo "Wrong username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
   
    <link rel = "stylesheet" href="navbar.css"> 
    <title>Log in</title>
    <link rel="stylesheet" href="style.css">
</head>

<body style='background: url(train.jpg); background-repeat:no-repeat; background-size:100% 100%; background-size: cover;'>

<header>
<img src="PNR_logo.png" id="logo">
    <h1 style="left: 4%;"> <span> PNR ONLINE TICKETING SYSTEM</span></h1>
 
    <nav>

        <ul>
            <li><a href="signup.php">Sign up</a><li>
        </ul>
    </nav>

</header>   
   
    <div id="box">
    <img src="PNR_logo.png" id="logo">
    <img src="log.jpg" id="log">
        <form method="post">
        <div style="font-size: 30px; margin: 10px; color: black; font-weight:bold;text-align:center">Log in</div>
            <p>Username</p>
            <input type="text" name="user_name"  placeholder="Enter your username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter your password">

            <input type="submit" value="Log in">
        </form>
    </div>
</body>

</html>