<?php

include("indexconnect.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
   //something was posted
   $transnum = rand(1,1000000);
   $name = $_POST['name'];

   if(isset($_POST['bound'])){
    $bound = $_POST['bound'];
   }
   if(isset($_POST['departure'])){
    $departure = $_POST['departure'];
   }
   if(isset($_POST['arrival'])){
    $arrival = $_POST['arrival'];
   }
   if(isset($_POST['time'])){
    $time = $_POST['time'];
   }
   
   if(!empty($name)&& !empty($bound) && !empty($departure) && !empty($arrival) && !empty($time)){
       $stmt = $conn->prepare("insert into index_connection (transaction_num, name, bound, departure, arrival, time, payable) values ('$transnum','$name', '$bound', '$departure', '$arrival', '$time', '15')");
       $stmt->execute();
       echo "VIRTUAL TICKET: Print and present this details upon boarding the train"; echo "<br>";
       $result = mysqli_query($conn, "SELECT * FROM index_connection WHERE transaction_num='$transnum'");
       while($row = mysqli_fetch_array($result))
           {
               echo 'Reference Number: '.$row['id'].'<br>';
               echo 'Name: '.$row['name'].'<br>';
               echo 'Bound: '.$row['bound'].'<br>';
               echo 'Departure Station: '.$row['departure'].'<br>';
               echo 'Arrival Station: '.$row['arrival'].'<br>';
               echo 'Departure Schedule: '.$row['time'].'<br>';
               echo 'Payable: '.$row['payable'].'<br>';
               echo 'Date Booked: '.$row['date'].'<br>';
               echo 'Time Booked: '.$row['time_booked'].'<br>';
           }
       $stmt->close();
       $conn->close();
   }
   else{
    echo "Please enter some valid information!";
   }
}
?>