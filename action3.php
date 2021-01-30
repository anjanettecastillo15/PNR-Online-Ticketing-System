<?php
    require 'dbcontroller.php';
    $output='';
    $sql = "SELECT * FROM time_table WHERE departureID='".$_POST['timeID']."'ORDER BY id";
    $result=mysqli_query($conn, $sql);
    $output .='<option value="" disabled selected>Select Time</option>';
    while($row=mysqli_fetch_array($result)){
        $output .='<option value="'.$row["id"]. '">' .$row["d_time"].'</option>';
    }
    echo $output;
?>