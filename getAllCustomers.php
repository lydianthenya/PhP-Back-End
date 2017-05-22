<?php
require_once('dbConnect.php');
header("Content-Type:application/json");
$sql ="Select * FROM customer";
$results= mysqli_query($con,$sql);
$array_main=array();
while ($row = mysqli_fetch_assoc($results)) {
   $array_main[]=$row; 
}
echo json_encode($array_main);