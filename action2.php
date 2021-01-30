<?php
    require 'dbcontroller.php';
    $output='';
    $sql = "SELECT * FROM arrival_table WHERE boundID='".$_POST['boundID']."'ORDER BY id";
    $result=mysqli_query($conn, $sql);
    $output .='<option value="" disabled selected>Select Arrival Station</option>';
    while($row=mysqli_fetch_array($result)){
        $output .='<option value="'.$row["id"]. '">' .$row["arrival_station"].'</option>';
    }
    echo $output;
?>