<?php
  $host = "localhost: 3307";
  $user = "root";
  $pass = "";
  $dtbname = "indexconnect";
  
    //database connection

    if(!$conn = mysqli_connect($host, $user, $pass, $dtbname))
    {

        die("failed to connect!");
    }
    
    
?>

