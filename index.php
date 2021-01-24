

<?php

session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

if($_SERVER['REQUEST_METHOD'] == "POST"){

    //$passengers = $_POST['passengers'];
    $bound = $_POST['bound'];
    $passengertype = $_POST['passengertype'];
    $departure = $_POST['departure'];
    $arrival = $_POST['arrival'];
}
?>

<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query = "SELECT * FROM bound";
$results = $db_handle->runQuery($query);
?>


<html>
<head>
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
        background-color: #b4c8d0;
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
</style>
<script src="jquery.main.js" type="text/javascript"></script>

<script type="text/javascript">
    function getDeparture(val){
        $.ajax({
            type: "POST",
            url: "getDeparture.php",
            data: "bound_id="+val,
            success:function(data){
                $("#departure-list").html(data);
                getArrival();
            }
        });
    }
    function getArrival(val){
        $.ajax({
            type: "POST",
            url: "getArrival.php",
            data: "departure_id="+val,
            success:function(data){
                $("#arrival-list").html(data);
                getTime();
            }
        });
    }
    function getTime(val){
        $.ajax({
            type: "POST",
            url: "getTime.php",
            data: "arrival_id="+val,
            success:function(data){
                $("#time-list").html(data);
              
            }
        });
    }

</script>

<body>
    <div class="frm">
        <h2>Please complete all the informations needed</h2>
        <div class="row">
            <label>Bound:</label><br>
            <select name="bound" id="bound-list" class="InputBox" onChange="getDeparture(this.value);">
                <option value disabled selected>Select Bound</option>
                <?php
                    foreach($results as $bound) {
                ?>
                <option value = "<?php echo $bound["id"]; ?>"><?php echo $bound["bound"]; ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <div class="row">
            <label>Departure Station:</label><br>
            <select name="departure" id="departure-list" class="InputBox" onChange="getArrival(this.value);">
                <option value="">Select Departure Station</option>
            </select>
        </div>
        <div class="row">
            <label>Arrival Station:</label><br>
            <select name="arrival" id="arrival-list" class="InputBox" onChange="getTime(this.value);">
                <option value="">Select Arrival Station</option>
            </select>
        </div>
        <div class="row">
            <label>Time:</label><br>
            <select name="time" id="time-list" class="InputBox">
                <option value="">Select Time</option>
            </select>
        </div>

    </div>
    
</body>
</html>
