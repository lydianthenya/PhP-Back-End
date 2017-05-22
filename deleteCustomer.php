<?php 
 //Getting Id
 $id = $_GET['id'];
 
 //Importing database
 require_once('dbConnect.php');
 
 //Creating sql query
 $sql = "DELETE FROM customer WHERE id=$id;";
 
 //Deleting record in database 
 if(mysqli_query($con,$sql)){
 echo 'Customer Deleted Successfully';
 }else{
 echo 'Could Not Delete Customer Try Again';
 }
 
 //closing connection 
 mysqli_close($con);