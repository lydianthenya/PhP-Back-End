<?php
require_once('dbConnect.php');
header("Content-Type:application/json");
extract($_POST);
$sql ="Select * FROM customer WHERE $selector='$search'";
$results= mysqli_query($con,$sql);
$array_main=array();
while ($row = mysqli_fetch_assoc($results)) {
   $array_main[]=$row; 
}
echo json_encode($array_main);