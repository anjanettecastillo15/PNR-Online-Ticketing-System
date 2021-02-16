<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
   //something was posted
   $transnum = rand(1,1000000);
   $name = $_POST['name'];
   $bound = $_POST['bound'];
   $departure = $_POST['departure'];
   $arrival = $_POST['arrival'];
   $time = $_POST['time'];
   $ptype = $_POST['ptype'];
   $idnum = $_POST['idnum'];

  
   $conn = new mysqli('localhost: 3307', 'root', '', 'indexconnect');
   if($conn->connect_error){
       die('Connection Failed : ' .$conn->connect_error);
   }
   else{
       $stmt = $conn->prepare("insert into index_connection (transaction_num, name, bound, departure, arrival, time, ptype, idnum) values ('$transnum','$name', '$bound', '$departure', '$arrival', '$time', '$ptype', '$idnum')");
       $stmt->execute();
       echo "VIRTUAL TICKET: Please show this to the station guard upon entering the train"; echo "<br>";
       $result = mysqli_query($conn, "SELECT * FROM index_connection WHERE transaction_num='$transnum'");
       while($row = mysqli_fetch_array($result))
           {
               echo 'Reference Number: '.$row['id'].'<br>';
               echo 'Name: '.$row['name'].'<br>';
               echo 'Bound: '.$row['bound'].'<br>';
               echo 'Departure: '.$row['departure'].'<br>';
               echo 'Arrival: '.$row['arrival'].'<br>';
               echo 'Departure Schedule: '.$row['time'].'<br>';
               echo 'Passenger: '.$row['ptype'].'<br>';
               echo 'ID Number: '.$row['idnum'].'<br>';
               echo 'Date Booked: '.$row['date'].'<br>';
               echo 'Time Booked: '.$row['time_booked'].'<br>';
           }
       $stmt->close();
       $conn->close();
   }
}
?>