<?php
include 'conn.php';
$id=$_GET['id'];//2
$status=$_GET['status'];//1
if($status==1)
{  //button = 1 and table = 0 change 1 (today date) click marks as deliverd
    $query="Update appointment set status=1,appointmentdate=now() where appointment_id='$id'";
    $go_update=mysqli_query($connection,$query);
    header("location:book_mgmt.php");

}
else //status = 0 , button = 0 and table = 1 change 0 ( null )click undo button
{
    $query="Update appointment set status=0,appointmentdate='null' where appointment_id='$id'";
    $go_update=mysqli_query($connection,$query);
    header("location:book_mgmt.php");
}
?>