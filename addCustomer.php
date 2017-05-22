<?php 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 
 //Getting values
 $fname = $_POST['fname'];
 $oname = $_POST['oname'];
 $nationalid = $_POST['nationalid'];
 $address=$_POST['address'];
$customer_id=$_POST['customer_id'];
 $mobile_number=$_POST['mobile_number'];

 $target_dir = "uploads/";
                 

 $path = $_FILES['fileToUpload']['name'];
 $ext = pathinfo($path, PATHINFO_EXTENSION);
 $x=rand(100000,10000000);
 $y=rand(100000,10000000);
 $new_name=$x."_".$y.".".$ext;
 $target_file = $target_dir .$new_name;
 
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
  {
 //Creating an sql query
				 $sql = "INSERT INTO `customer`(`fname`, `oname`, `address`, `national_id`, `mobile_number`,
				  `customer_photo`,`customer_id`) VALUES  ('$fname','$oname','$address','$nationalid','$mobile_number','$target_file','$customer_id')";
				 //Importing our db connection script
				 require_once('dbConnect.php');
				 
				 //Executing query to database
				 if(mysqli_query($con,$sql))
				 {
				 
				 	include 'notify.php';
				   echo json_encode(array('response'=>'Customer Added Successfully','status'=>'success'));
				 }else{
				   echo json_encode(array('response'=>'Could not add custommer','status'=>'failure'));
				 }
				 
				 //Closing the database 
				 mysqli_close($con);
   }else{
   	 echo json_encode(array('response'=>'Could not save image','status'=>'failure'));
   }
 }
 else{
   echo json_encode(array('response'=>'Error','status'=>'failure'));
 }
 