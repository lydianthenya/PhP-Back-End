<?php 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 //Getting values 
extract($_POST);
 
 //importing database connection script 
 require_once('dbConnect.php');
 
 //Creating sql query 



 $sql="UPDATE `customer` SET `fname`='$fname',`oname`='$oname',`address`='$address',`national_id`='$nationalid',`mobile_number`='$mobile_number',`customer_id`='$customer_id' WHERE `id`=$id";
 
 //Updating database table 
 if(mysqli_query($con,$sql)){
 echo 'Customer Updated Successfully';
 }else{
 echo 'Could Not Update Customer Try Again';
 }
 
 //closing connection 
 mysqli_close($con);
 }