<?php


if($_SERVER['REQUEST_METHOD'] == "POST"){
   //something was posted
   $name = $_POST['name'];
   $bound = $_POST['bound'];
   $departure = $_POST['departure'];
   $arrival = $_POST['arrival'];
   $time = $_POST['time'];
   $ptype = $_POST['ptype'];
   $idnum = $_POST['idnum'];
   $amount = $_POST['amount'];

  
   $conn = new mysqli('localhost: 3307', 'root', '', 'indexconnect');
   if($conn->connect_error){
       die('Connection Failed : ' .$conn->connect_error);
   }
   else{
       $stmt = $conn->prepare("insert into index_connection (name, bound, departure, arrival, time, ptype, idnum, amountpaid) values ('$name', '$bound', '$departure', '$arrival', '$time', '$ptype', '$idnum', '$amount')");
       $stmt->execute();
       echo "you have successully bought a train ticket";
       $stmt->close();
       $conn->close();
   }
}
?>