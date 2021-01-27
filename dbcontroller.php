<?php

$conn = mysqli_connect('localhost: 3307', 'root', '', 'process_db');
if(!$conn){
    die("could not connect to the database : " .mysqli_connect_error());
}
?>