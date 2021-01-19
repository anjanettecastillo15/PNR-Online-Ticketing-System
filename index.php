

<?php

session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

if($_SERVER['REQUEST_METHOD'] == "POST"){

    //$passengers = $_POST['passengers'];
    $passengertype = $_POST['passengertype'];
    $departure = $_POST['departure'];
    $arrival = $_POST['arrival'];
}
?>


<html>
<head>
    <title>PNR Online Ticketing | Home</title>
    
<body>

        <div id="box">
            <form method="post">
            <div style="font-size: 20px; margin: 10px; color: white;">first</div>

            <p>Please fill out the needed information:</p>

            <!--<label for="passengers">How many passengers: </label>
            <input id="text" type="text" name="passengers"> <br><br>-->

            <label for="passengertype">Type of passenger:</label>
            <select name="passengertype" id="passengertype">
                <option value="regular">Regular</option>
                <option value="student">Student</option>
                <option value="pregnant">Pregnant</option>
                <option value="pwd">PWD</option>
                <option value="senior">Senior</option>
            </select>
                <br><br>

            <label for="departure">Departure Station: </label> 
            <select name="departure" id="departure"> 
                <option value="alabang">Alabang</option>
                <option value="sucat">Sucat</option>
                <option value="bicutan">Bicutan</option>
                <option value="fti">FTI</option>
                <option value="nichols">Nichols</option>
                <option value="edsa">EDSA</option>
                <option value="pasay">Pasay</option>
                <option value="buendia">Buendia</option>
                <option value="vitocruz">Vito Cruz</option>
                <option value="sanandres">San Andres</option>
                <option value="paco">Paco</option>
                <option value="pandacan">Pandacan</option>
                <option value="stamesa">Sta. Mesa</option>
                <option value="espana">España</option>
                <option value="laonlaan">Laon-laan</option>
                <option value="blumentritt">Blumentritt</option>
                <option value="tutuban">Tutuban</option>
            </select>
                <br><br>

            <label for="arrival">Arrival Station: </label> 
            <select name="arrival" id="arrival"> 
                <option value="alabang">Alabang</option>
                <option value="sucat">Sucat</option>
                <option value="bicutan">Bicutan</option>
                <option value="fti">FTI</option>
                <option value="nichols">Nichols</option>
                <option value="edsa">EDSA</option>
                <option value="pasay">Pasay</option>
                <option value="buendia">Buendia</option>
                <option value="vitocruz">Vito Cruz</option>
                <option value="sanandres">San Andres</option>
                <option value="paco">Paco</option>
                <option value="pandacan">Pandacan</option>
                <option value="stamesa">Sta. Mesa</option>
                <option value="espana">España</option>
                <option value="laonlaan">Laon-laan</option>
                <option value="blumentritt">Blumentritt</option>
                <option value="tutuban">Tutuban</option>
            </select>
            <br><br>
                
            <input id="button" type="submit" value="proceed"> 

                
            </form>
        </div>

    
</body>
</head>
</html>
