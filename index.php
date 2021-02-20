<?php
    session_start();
   
    include("indexconnect.php");
    //("indexagain.php");
        
?>

<html>
<head>
    <link rel = "stylesheet" href="navbar.css">
    <title>PNR Online Ticketing | Home</title>
</head>  

<style type="text/css">
    body{width: 800px;
        font-family: calibri;
        padding: 0;
        margin: 0 auto;
        }
    .frm{
        border:1px solid #7ddaff;
        background-color: rgb(240,248,255,0.7);
        margin: 0px auto;
        padding: 40px;
        border-radius: 4px;
    }
    .InputBox{
        padding: 10px;
        border:#bdbdbd 1px solid;
        border-radius: 4px;
        background-color: #FFF;
        width: 50%;
    }
    .row{
        padding-bottom: 15px;
        padding-left: 150px;
    }
    
    #button{
            margin:auto;
            padding: 10px;
            width: 100px;
            color: white;
            background-color: blue;
            border: none;
            float: right;
        }
</style>

<body style='background: url(train.jpg); background-repeat:no-repeat; background-size:100% 100%; background-size: cover;'>

<header>
    <h1><span> PNR ONLINE TICKETING SYSTEM</span></h1>
    <nav>
        <ul>
            <li><a href="logout.php">Log out</a><li>
        </ul>
    </nav>
</header>  
<form method="post" action="indexagain.php">
    <div class="frm">
        
        <h2><center>Please complete all the informations needed</center></h2>

        <div class="row">
            <label>Name:</label><br>
            <input type="text" id="name" name="name"  class="InputBox" placeholder="Enter Name">
        </div>

        <div class="row">
            <label>Bound:</label><br>
            <select name="bound" id="bound-list" class="InputBox" >
                <option value="" disabled selected>Select Bound</option>
                <option>Northbound</option>
                <option>Southbound</option>
            </select>
        </div>

        <div class="row">
            <label>Departure Station:</label><br>
            <select name="departure" id="departure-list" class="InputBox">
                <option value="" disabled selected>Select Departure Station</option>
                <option>Alabang</option>
                <option>Sucat</option>
                <option>Bicutan</option>
                <option>FTI</option>
                <option>Nichols</option>
                <option>EDSA</option>
                <option>Pasay</option>
                <option>Buendia</option>
                <option>Vito Cruz</option>
                <option>San Andres</option>
                <option>Paco</option>
                <option>Pandacan</option>
                <option>Sta. Mesa</option>
                <option>España</option>
                <option>Laon-laan</option>
                <option>Blumentritt</option>
                <option>Tutuban</option>
            </select>
        </div>

        <div class="row">
            <label>Arrival Station:</label><br>
            <select name="arrival" id="arrival-list" class="InputBox">
                <option value="" disabled selected>Select Arrival Station</option>
                <option>Alabang</option>
                <option>Sucat</option>
                <option>Bicutan</option>
                <option>FTI</option>
                <option>Nichols</option>
                <option>EDSA</option>
                <option>Pasay</option>
                <option>Buendia</option>
                <option>Vito Cruz</option>
                <option>San Andres</option>
                <option>Paco</option>
                <option>Pandacan</option>
                <option>Sta. Mesa</option>
                <option>España</option>
                <option>Laon-laan</option>
                <option>Blumentritt</option>
                <option>Tutuban</option>
            </select>
        </div>

        <div class="row">
            <label>Time:</label><br>
            <select name="time" id="time-list" class="InputBox">
                <option value="" disabled selected>Select Time</option>
                <option>05:12 AM</option>
                <option>06:02 AM</option>
                <option>06:42 AM</option>
                <option>07:13 AM</option>
                <option>08:22 AM</option>
                <option>09:32 AM</option>
                <option>11:12 AM</option>
                <option>12:22 PM</option>
                <option>01:12 PM</option>
                <option>03:02 PM</option>
                <option>04:22 PM</option>
                <option>05:12 PM</option>
                <option>06:22 PM</option>
                <option>07:42 PM</option>
            </select>
        </div>

        <input id="button" type="submit" value="Next">
    
    </div>
</form>
</body>
</html>