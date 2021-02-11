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
        #text{
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
        }

        #box{
            background: rgb(240,248,255,0.7);
            margin:auto;
            text-align:center;
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
    </style>

    
    <div id="box">
        <form method="post">
        <div  style="font-size: 30px; margin: 10px; color: black; font-weight:bold;">Sign up</div>

            <input id="text" type="text" name="user_name" placeholder= "Enter username"> <br><br>
            <input id="text" type="password" name="password" placeholder= "Enter password"> <br><br>

            <input id="button" type="submit" value="Sign up"> <br><br>
        </form>
    </div>
</body>
</head>
</html>