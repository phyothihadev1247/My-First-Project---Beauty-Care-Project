<?php
session_start();
include '../admin/conn.php';
$book_id=$_SESSION['bookid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="sytles/treatment.css" />
</head>
<body>
    <?php
    include 'header.php';
    ?>
    <br>
  <br>
  <br>
  <br>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h3>Dear Customer,
                <?php
                    if (!empty($_SESSION['patient'])) {
                        echo $_SESSION['patient'];
                            } else 
                            {
                                $_SESSION['patient'] = '';
                                echo "no";
                                }
                ?>
                </h3>
                <br>
                <p>You successfully Booking the following treatments.Thanks for your booking here.</p>
                
                <p><span style="background-color: #ebeced;">Note : Please bring the <span class="text-success"><i><strong>appointment letter</strong></i></span> below when you come for treatment.</strong></span></p>
            </div>
        </div>
        <br>
        <h3 class="text-center">Appointment Letter</h3>
        <br> 
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header bg-success text-center text-white">Customer's Information</div>
                    

                                 
                    <div class="card-body">
                        <table class="table table-hover">
                                
                                
                            <?php
                           $query="Select * from appointment where appointment_id='$book_id'";
                           $go_query=mysqli_query($connection,$query);
                           while($out=mysqli_fetch_array($go_query))
                           {
                            $db_token=$out['appointment_id'];
                            $db_name=$out['patientname'];
                            $db_email=$out['email'];
                            $db_phone=$out['phone'];
                            $db_date=$out['date_of_birth'];
                            $db_gender=$out['gender'];
                            $db_payment=$out['payment_method'];
                            $db_bookingdate=$out['bookingdate'];
                           }
                           ?>
                            
                            <tr>
                                <td>Token Number</td>
                                <td><?php echo "BC2024-101".$db_token  ?></td>
                            </tr>
                            <tr>
                                <td>Booking Date</td>
                                <td><?php echo $db_bookingdate  ?></td>
                            </tr>
                            <tr>
                                <td>Customer Name</td>
                                <td><?php echo $db_name  ?></td>
                            </tr>
                            <tr>
                                <td>Customer Email</td>
                                <td><?php echo $db_email  ?></td>
                            </tr>
                            <tr>
                                <td>Customer Phone</td>
                                <td><?php echo $db_phone ?></td>
                            </tr>
                            <tr>
                                <td>Date of birth</td>
                                <td><?php echo $db_date ?></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><?php echo $db_gender ?></td>
                            </tr>
                            <tr>
                                <td>Payment Type</td>
                                <td><?php echo $db_payment ?></td>
                            </tr>  
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header bg-success text-center text-white">Treatment Information</div>
                    <div class="card-body">
                        <table class="table table-hover">
                                
                            <tr>
                                <td>Doctor Name</td>
                                <td>Treatment Name</td>
                                <td>Duration</td>
                                <td>Price</td>
                            </tr>
                            <?php
                                $total=0;
                                $query="SELECT payment.*, treatments.*, staff.* 
                                 FROM payment
                                 INNER JOIN treatments ON payment.treatment_id = treatments.treatment_id
                                 LEFT JOIN staff ON treatments.staff_id = staff.staff_id
                                 WHERE payment.appointment_id = '$book_id'";
                                $go_query=mysqli_query($connection,$query);
                                while($out=mysqli_fetch_array($go_query))
                                {
                                    $doctorname=$out['username'];
                                    $speciality=$out['speciality'];
                                    $treatmentname=$out['name'];
                                    $duration=$out['duration'];
                                    $price=$out['price'];
                            
                                    $total += $price;
                                    echo "<tr>";
                                    echo "<td>- {$doctorname} ($speciality)</td>";
                                    echo "<td>- {$treatmentname}</td>";
                                    echo "<td>{$duration}mins</td>";
                                    echo "<td>{$price}MMK</td>";
                                    echo "</tr>";
                                }
                            ?>
                            <tr>
                                <td colspan="3" align="right">Total Amount</td>
                                <td><?php echo $total; ?>MMK</td>
                            </tr>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                                
                   
        </div>
    </div>
</body>
</html>