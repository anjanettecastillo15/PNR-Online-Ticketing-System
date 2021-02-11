<?php 

session_start();

include("connection.php");
include("functions.php");
?>

<html>
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

</style>
<body  style='background: url(train.jpg); background-repeat:no-repeat; background-size:100% 100%; background-size: cover;'> 
<div id="title"> <h1>PNR Online Ticketing System<h1> </div>
    <div id="box">
        <form method="post">
        <div style="font-size: 30px; margin: 10px; color: black; font-weight:bold;">PAYMENT</div>

            <input id="text" type="text" name="user_name"  placeholder="Enter amount"> <br><br>
            <input id="button" type="submit" value="PAY"> <br><br>
        </form>
    </div>
</body>
</html>