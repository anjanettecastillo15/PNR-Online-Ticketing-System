<?php 

session_start();

include("connection.php");
include("functions.php");
?>

<html>
<head>
    <link rel = "stylesheet" href="navbar.css">
    <title>PNR Online Ticketing | Payment</title>

</head>
<style>
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
.InputBox{
            padding: 10px;
            border:#bdbdbd 1px solid;
            border-radius: 4px;
            background-color: #FFF;
            width: 50%;
    }

</style>
<body  style='background: url(train.jpg); background-repeat:no-repeat; background-size:100% 100%; background-size: cover;'> 
<header>
   
    <h1><span> PNR ONLINE TICKETING SYSTEM</span></h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a><li>
            <li><a href="logout.php">Log out</a><li>
        </ul>
    </nav>
</header>  

    <div id="box">
        <form method="post">
        <div style="font-size: 30px; margin: 10px; color: black; font-weight:bold;">PAYMENT</div>
        <label>Enter Amount:</label><br>
            <input id="text" type="text" name="user_name"  class="InputBox" placeholder="Enter amount"> <br><br>
            <input id="button" type="submit" value="PAY"> <br><br>
        </form>
    </div>
</body>
</html>