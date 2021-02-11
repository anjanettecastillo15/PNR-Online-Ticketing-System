<?php
    session_start();
   
    include("indexconnect.php");
    include("indexagain.php");
    include("connection.php");
    include("functions.php");

    
$user_data = check_login($con);

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $bound = $_POST['bound'];
    $departure = $_POST['departure'];
    $arrival = $_POST['arrival'];

}
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
<script src="jquery.main.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){
    $("#bound-list").change(function(){
        var bound_id=$(this).val();
        $.ajax({
            url:"action.php",
            method: "POST",
            data: {boundID: bound_id},
            success: function(data){
                $("#departure-list").html(data);
            }
        });
    });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    $("#bound-list").change(function(){
        var bound_id=$(this).val();
        $.ajax({
            url:"action2.php",
            method: "POST",
            data: {boundID: bound_id},
            success: function(data){
                $("#arrival-list").html(data);
            }
        });
    });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    $("#departure-list").change(function(){
        var time_id=$(this).val();
        $.ajax({
            url:"action3.php",
            method: "POST",
            data: {timeID: time_id},
            success: function(data){
                $("#time-list").html(data);
            }
        });
    });
});
</script>

<body style='background: url(train.jpg); background-repeat:no-repeat; background-size:100% 100%; background-size: cover;'>

<header>
    <h1><span> PNR ONLINE TICKETING SYSTEM</span></h1>
    <nav>
        <ul>
            <li><a href="logout.php">Log out</a><li>
        </ul>
    </nav>
</header>  
<form method="post">
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
               <?php
                    require_once 'dbcontroller.php';
                    $sql = "SELECT * FROM bound_table ORDER BY bound";
                    $result = mysqli_query($conn, $sql);
                    while($row=mysqli_fetch_array($result)){
               ?>
               <option value="<?= $row['id']; ?>"><?= $row['bound'];?></option>
               <?php } ?>
            </select>
        </div>

        <div class="row">
            <label>Departure Station:</label><br>
            <select name="departure" id="departure-list" class="InputBox">
                <option value="" disabled selected>Select Departure Station</option>
                <?php
                    require_once 'dbcontroller.php';
                    $sql = "SELECT * FROM time_table ORDER BY time";
                    $result = mysqli_query($conn, $sql);
                    while($row=mysqli_fetch_array($result)){
               ?>
               <option value="<?= $row['id']; ?>"><?= $row['d_time'];?></option>
               <?php } ?>
            </select>
        </div>

        <div class="row">
            <label>Arrival Station:</label><br>
            <select name="arrival" id="arrival-list" class="InputBox">
                <option value="" disabled selected>Select Arrival Station</option>
            </select>
        </div>

        <div class="row">
            <label>Time:</label><br>
            <select name="time" id="time-list" class="InputBox">
                <option value="" disabled selected>Select Time</option>
            </select>
        </div>

        <div class="row">
            <label>Passenger Type:</label><br>
            <select name="ptype" id="ptype_list" class="InputBox">
                <option value="" disabled selected>Select Passenger Type</option>
                <option>Regular</option>
                <option>Student</option>
                <option>Senior Citizen</option>
                <option>PWD</option>
            </select>
        </div>

        <div class="row">
            <label>ID Number (Student LRN/ OSCA Number/ PWD number. If regular type N/A):</label><br>
            <input type="text" id="idnum" name="idnum"  class="InputBox" placeholder="Enter ID Number">
        </div>

        <div class="row">
            <label>Enter Amount:</label><br>
            <input type="text" id="amount" name="amount"  class="InputBox" placeholder="Enter Amount">
        </div>
 
         <input id="button" type="submit" value="Next">
    
    </div>
</form>
</body>
</html>