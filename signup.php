<?php

session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        //something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name)&& !empty($password) && !is_numeric($user_name)){

            //save to database
            $user_id = random_num(20);
            $query = "insert into users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')"; 
            
            mysqli_query($con, $query);

            header("Location: login.php");
            die;
       
        }
        else{

            echo "Please enter some valid information!";
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
<link rel = "stylesheet" href="navbar.css"> 
    <title>Sign up</title>
<body style='background: url(train.jpg); background-repeat:no-repeat; background-size:100% 100%; background-size: cover;'>
<header>
   
    <h1><span> PNR ONLINE TICKETING SYSTEM</span></h1>
    <nav>
        <ul>
            <li><a href="login.php">Login</a><li>
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
        }

        #button{
            margin:auto;
            padding: 10px;
            width: 100px;
            color: white;
            background-color: blue;
            border: none; 
            */
        

        #box{
            background: rgb(240,248,255,0.8);
            margin:auto;
            margin-top: 150px;
            margin-bottom: 150px;
            width: 300px;
            padding: 20px;
        }

        #title{
            background: #FF8C00;
            opacity:0.7;
            text-align:center;
            font-family: sans-serif;
            color: black;
           
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
        <form method="post">
        <img src="log.jpg" id="log">
        <div  style="font-size: 30px; margin: 10px; color: black; font-weight:bold; text-align:center;">Sign up</div>
            <p>Username</p>
            <input type="text" name="user_name" placeholder= "Enter username"> 
            <p>Password</p>
            <input type="password" name="password" placeholder= "Enter password"> 

            <input type="submit" value="Sign up">
        </form>
    </div>
</body>
</head>
</html>