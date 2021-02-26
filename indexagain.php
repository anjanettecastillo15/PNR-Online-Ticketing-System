<!DOCTYPE html>
<html>
<head>
   
    <link rel = "stylesheet" href="navbar.css"> 
    <title>Log in</title>
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
            <li><a href="index.php">Home</a><li>
            <li><a href="logout.php">Log Out</a><li>
        </ul>
    </nav>

</header>   
    
</body>

</html>


<?php

include("indexconnect.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
   //something was posted
   $transnum = rand(1,1000000);
   $name = $_POST['name'];

   if(isset($_POST['departure'])){
    $departure = $_POST['departure'];
   }
   if(isset($_POST['arrival'])){
    $arrival = $_POST['arrival'];
   }
   if(isset($_POST['time'])){
    $time = $_POST['time'];
   }
   if(isset($_POST['date'])){
    $dot = $_POST['date'];
   }
   
   if(!empty($name) && !empty($departure) && !empty($arrival) && !empty($time) && !empty($dot)){
       if($departure === $arrival){
            echo "<div id=girl>";
            echo "Stations are not valid";
            echo "</div>";
       }
       else{
        $stmt = $conn->prepare("insert into index_connection (transaction_num, name, date_of_travel, departure, arrival, time, payable) values ('$transnum','$name','$dot','$departure', '$arrival', '$time', '15')");
        $stmt->execute();
        
        $result = mysqli_query($conn, "SELECT * FROM index_connection WHERE transaction_num='$transnum'");
        while($row = mysqli_fetch_array($result))
            {
                echo"<div id=girl>";
                echo "VIRTUAL TICKET";
                echo "<br>";
                echo "<br>";
                echo "Print and present this details upon boarding the train";
                echo "<br>";
                echo "<br>";
                echo 'Reference Number: '.$row['transaction_num'].'<br>';
                echo 'Name: '.$row['name'].'<br>';
                echo 'Date of Travel: '.$row['date_of_travel'].'<br>';
                echo 'Departure Station: '.$row['departure'].'<br>';
                echo 'Arrival Station: '.$row['arrival'].'<br>';
                echo 'Departure Time: '.$row['time'].'<br>';
                echo 'Payable: '.$row['payable'].'<br>';
                echo "<br>";
                echo "<br>";
                echo 'Date Booked: '.$row['date'].'<br>';
                echo 'Time Booked: '.$row['time_booked'].'<br>';
                echo"</div>";
            }
        $stmt->close();
        $conn->close();
       }
       
   }
   else{
    echo "<div id=girl>";
    echo "Please enter some valid information!";
    echo "</div>";
   }
}
?>