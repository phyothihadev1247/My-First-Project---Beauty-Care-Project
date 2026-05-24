<?php
     include 'conn.php';
     $payments=mysqli_query($connection,"Select * from payment order by appointment_id desc");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments List</title>
    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body{
            background-image: linear-gradient(to left top, rgb(158, 3, 201), rgb(22, 200, 160));
        }
        main{
            background-color: transparent;
            box-sizing: border-box;
            backdrop-filter: blur(40px);
        }
        table img{
            border-radius: 200px;
        }
    </style>
</head>
<body>
    <?php
        include 'header.php';
    ?>
    <br>
    <br>
    <br>
    <main class="container">
        <div class="row mt-3">
            <div class="col-md-4">
                <h3>Payment Lists</h3>
            </div>
        </div>

        <div class="row mt-3 justify-content-center">
            <div class="col-md-12">
                <table class="table table-primary table-hover table-striped">
                    <tr class="table-warning"> 
                    <th>Token No</th>
                    <th>Treatment Voucher No</th>
                    <th>Amount</th>
                    <th>Payment Date</th>
                    <th>Action</th>
                    </tr>
                    <?php
                            while($out=mysqli_fetch_array($payments)) 
                            {
                                $check=$out['status'];
                                if($check>0)
                                {
                                    $show='<tr class="mark">';
                                }
                                else
                                {
                                    $show='<tr>';
                                }
                                    $show.='<td>'."BC2024-101".$out['appointment_id'].'</td>';
                                    $show.='<td>'."BCV24-A10".$out['treatment_id'].'</td>';
                                    $show.='<td>'.$out['amount']." MMK".'</td>';
                                    

                                $chesec=$out['status'];// 0 or 1
                                if($chesec>0)
                                {
                                    $show.='<td>'.$out['paymentdate'].'</td>';
                                }
                                else
                                {
                                    $show.='<td>----/--/--</td>';
                                }
                                if($out['status'])//0 
                                {
                                   $show.='<td><a href="pstatus.php?id='.$out['appointment_id'].'&status=0" class="btn btn-outline-danger btn-sm"><i class="bi bi-arrow-counterclockwise"></i></a></td>';
                                    
                                }
                                else // 1
                                {
                                    $show.='<td><a href="pstatus.php?id='.$out['appointment_id'].'&status=1" class="btn btn-outline-primary btn-sm"><i class="bi bi-currency-dollar"></i></a></td>';
                                }
                                $show.='</tr>';
                                echo $show;


                            }
                            ?>
                    
                </table>
            </div>
        </div>
    </main>
</body>
</html>