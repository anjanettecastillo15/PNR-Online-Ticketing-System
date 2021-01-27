<?php
    require 'dbcontroller.php';
    $output='';
    $sql = "SELECT * FROM departure_table WHERE boundID='".$_POST['boundID']."'ORDER BY departure_station";
    $result=mysqli_query($conn, $sql);
    $output .='<option value="" disabled selected>Select Departure Station</option>';
    while($row=mysqli_fetch_array($result)){
        $output .='<option value="'.$row["id"]. '">' .$row["departure_station"].'</option>';
    }
    echo $output;
?>