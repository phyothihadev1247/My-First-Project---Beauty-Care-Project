<?php
session_start();
include '../admin/conn.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treatment Booking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
</head>
<body  style="background-color:#ebedf1;">
<?php include 'header.php'; ?>
<br>
  <br>
  <br>
  <br>
<div class="container mt-3">
    <div class="row" style="height:40px;margin-top:100px;">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3>Welcome 
                        <span>
                            <?php
                            if (!empty($_SESSION['patient'])) {
                                echo $_SESSION['patient'];
                            } else {
                                $_SESSION['patient'] = '';
                                echo "from BeautyCare Aesthetic Clinic ,";
                            }
                            ?>
                        </span>
                    </h3>
                </div>
                <div class="row" >
                    <div class="col-md-12" >
                        <div class="card ">
                            <div class="card-header text-center">
                                <h2>Treatment Booking</h2>
                            </div>
                            <?php 
                            if (!empty($_SESSION['book'])) : ?>
                                <div class="card-body">
                                    <table class="table table-condensed" style="background-color:#ebedf1;" >
                                        <thead >
                                            <tr>
                                                <th>Photo</th>
                                                <th>Doctor Name</th>
                                                <th>Treatment Name</th>
                                                <th>Description</th>
                                                <th>Duration</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total = 0;
                                            foreach ($_SESSION['book'] as $id => $qty) {
                                                $id = mysqli_real_escape_string($connection, $id);
                                                $result = mysqli_query($connection, "SELECT treatments.*, staff.* FROM treatments INNER JOIN staff ON treatments.staff_id = staff.staff_id WHERE treatments.treatment_id = '$id'");
                                                if ($result) {
                                                    $row = mysqli_fetch_assoc($result);
                                            ?>
                                                    <tr>
                                                        <td><img src="../Photo/<?php echo $row['photo'] ?>" width="100" height="100" class="img img-thumbnail" /></td>
                                                        <td><?php echo $row['username'] ?> (<?php echo $row['speciality'] ?>)</td>
                                                        <td><?php echo $row['name'] ?></td>
                                                        <td><?php echo $row['description'] ?></td>
                                                        <td><?php echo $row['duration']?>mins</td>
                                                        <td><?php echo $row['price']?>MMK</td>
                                                        <td>
                                                            <a href="remove.php?id=<?php echo $id ?>" class="btn btn-outline-danger btn-sm">Remove</a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    $total += $row['price'];
                                                } else {
                                                    echo "Error in query: " . mysqli_error($conn);
                                                }
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="5" align="right"><b>Total Amount:</b></td>
                                                <td><?php echo $total; ?>MMK</td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <a href="clear.php" class="btn btn-outline-danger">Clear Book</a>
                                    <a href="books.php" class="btn btn-default">Back</a>
                                    <a href="submitappointment.php" class="btn btn-outline-primary">Submit Appointment</a>
                                </div>
                            <?php else : ?>
                                <div class="card-body">
                                    <h3 class="text-danger lead text-center">You have not made a booking yet!</h3>
                                    <br>
                                    <p class="text-center"><a href="register.php" class="btn btn-outline-info">Please Register Now!</a></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
