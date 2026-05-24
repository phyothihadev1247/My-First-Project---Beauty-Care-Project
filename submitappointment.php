<?php
session_start();
include '../admin/conn.php';
if(!empty($_SESSION['patient']))
{
    $username=$_SESSION['patient'];
    $query="Select * from patients where username='$username'";
    $go_query=mysqli_query($connection,$query);
    while($out=mysqli_fetch_array($go_query))
    {
        $patientid=$out['patient_id'];
        $username=$out['username'];
        $email=$out['email'];
        $phone=$out['phone'];
        $date=$out['date_of_birth'];
        $gender = $out['gender'];

    }
}

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
    <?php include 'header.php'; ?>
    <br>
  <br>
  <br>
  <br>
    <div class="container mt-5">
        <div class="row">
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
                                    echo "no";
                                }
                                ?>
                            </span>
                        </h3>
                    </div>

                    <?php
                            $username=$_SESSION['patient'];
                            $query="Select * from patients where username='$username'";
                            $go_query=mysqli_query($connection,$query);
                            while($out=mysqli_fetch_array($go_query))
                            {
                                $patientid=$out['patient_id'];
                                $username=$out['username'];
                                $email=$out['email'];
                                $phone=$out['phone'];
                                $date=$out['date_of_birth'];
                                $gender = $out['gender'];
                        
                            }
                    ?>        
                    <div class="card-body">
                        <form action="submit.php" method="post">
                            <div class="mb-3">
                                <label for="" class="form-label">User Name</label>
                                <input type="text" name="uname" id="" class="form-control" value="<?php if(isset($username)){echo $username;} ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" name="email" id="" class="form-control" value="<?php if(isset($email)){echo $email;} ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Phone</label>
                                <input type="text" name="phone" id="" class="form-control" value="<?php if(isset($phone)){echo $phone;} ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label font-monospace">Date of Birth</label>
                                <input type="text" name="date" id="" class="form-control" value="<?php if(isset($date)){echo $date;} ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label font-monospace">Gender</label>
                                <input type="text" name="gender" id="" class="form-control" value="<?php if(isset($gender)){echo $gender;} ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Payment Type</label>
                                <select name="payment" id="" class="form-control">
                                    <option value="master card">Master Card</option>
                                    <option value="visa card">Visa Card</option>
                                    <option value="credit card">Credit Card</option>
                                </select>
                            </div>
                            <br>
                            <div class="mb-3 d-grid">
                                <input type="hidden" name="patientid" value="<?php echo $patientid; ?>">
                                <input type="submit" value="Submit" name="btnsubmit" class="btn btn-outline-success">
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
</body>
</html>