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

    if(!empty($user_name)&& !empty($password) && !is_numeric($user_name)){

        //read from database
        $query = "select * from users where user_name = '$user_name' limit 1"; 
        
        $result = mysqli_query($con, $query);

        if($result){
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] === $password){

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
</head>
<body style='background: url(train.jpg); background-repeat:no-repeat; background-size:100% 100%; background-size: cover;'>
<header>
   
    <h1><span> PNR ONLINE TICKETING SYSTEM</span></h1>
    <nav>

        <ul>
            <li><a href="signup.php">Sign up</a><li>
        </ul>
    </nav>

</header> 
    <style type="text/css">
        /* #text{
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;
        } */

        /* #button{
            margin:auto;
            padding: 10px;
            width: 100px;
            color: white;
            background-color: blue;
            border: none;
        } */

        #box{
            background: rgb(240,248,255,0.8);
            margin: auto;
            margin-top: 150px;
            margin-bottom: 150px;
            width: 300px;
            padding: 20px;
        }

        #title{
            background: #FF8C00;
            opacity:0.4;
            text-align:center;
            font-family: sans-serif;
            color: black;
            padding: 2px;
           
        }
        #log{
            width: 100px;
            height: 100px;
            border-radius: 50%;
            position:absolute;
            top:19%;
            left: 47%;        
    
        }
        #box p{
            margin:0;
            padding: 0;
            font-weight: bold;
        }
        #box input{
            width:100%;
            margin-bottom: 20px;
        }
        #box input[type="text"], input[type="password"]
        {
            border:none;
            border-bottom: 1px solid black;
            background: transparent;
            outline:none;
            height: 40px;
        }
        #box input[type="submit"]
        {
            border: none;
            outline: none;
            height: 40px;
            background: #1E90FF;
            color: #fff;
            font-size: 18px;
            border-radius: 20px; 

        }

        #box input[type= "submit"]:hover
        {
            cursor:pointer;
            background: #FFA500;
            color: #000;
        }
    </style>

   
    <div id="box">
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