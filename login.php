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
            <li><a href="#">About Us</a><li>
            <li><a href="#">Help</a><li>
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
            background-color: lightblue;
            border: none;
        }

        #box{
            background: rgb(240,248,255,0.7);
            margin: auto;
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
            padding: 2px;
           
        }
    </style>

   
    <div id="box">
        <form method="post">
        <div style="font-size: 30px; margin: 10px; color: black; font-weight:bold;">Log in</div>

            <input id="text" type="text" name="user_name"  placeholder="Enter username"> <br><br>
            <input id="text" type="password" name="password" placeholder="Enter password"> <br><br>

            <input id="button" type="submit" value="Log in"> <br><br>

            <a href="signup.php">Click to Sign up</a> <br><br>
        </form>
    </div>
</body>

</html>