<?php
session_start();
include '../admin/conn.php';
$patient_id=$_POST['patientid'];
$user_name=$_POST['uname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$date=$_POST['date'];
$gender=$_POST['gender'];
$payment=$_POST['payment'];


//add order tabel
$query="insert into appointment(bookingdate,patient_id,patientname,email,phone,date_of_birth,gender,payment_method,status)";
$query.="values(now(),'$patient_id','$user_name','$email','$phone','$date','$gender','$payment',0)";
$go_query=mysqli_query($connection,$query);
$booking_id=mysqli_insert_id($connection);

foreach($_SESSION['book']as $id=>$qty)
{
   $get_price =mysqli_query($connection,"Select * from treatments where treatment_id='$id'");
   while($out=mysqli_fetch_array($get_price))
   {
    $db_price=$out['price'];
   }
   $amount = $db_price;
   $query="insert into payment(appointment_id,treatment_id,amount,status)";
   $query.="values('$booking_id','$id','$amount',0)";
   $go_query=mysqli_query($connection,$query);
}

$_SESSION['bookid']=$booking_id;
unset($_SESSION['book']);
header("location:show_success.php");

?>