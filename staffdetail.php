<?php
     include 'conn.php';
     include 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Details List</title>
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
        if(isset($_GET['action']) && $_GET['action'] == 'delete'){
            delStaffdetail();
        }
    ?>
    <br>
    <br>
    <br>
    <main class="container">
        <div class="row mt-3">
            <div class="col-md-4">
                <h3>Doctor Details List</h3>
            </div>
        </div>

        <div class="row mt-3 justify-content-center">
            <div class="col-md-12">
                <table class="table table-primary table-hover table-striped">
                    <tr class="table-warning"> 
                        <th>Photo</th>
                        <th>No</th>
                        <th>Doctor Name</th>
                        <th>Professional 1</th>
                        <th>Professional 2</th>
                        <th>Professional 3</th>
                        <th>Certification 1</th>
                        <th>Certification 2</th>
                        <th>Certification 3</th>
                        <th>Experience Year</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        $query="Select staffdetail.*,staff.* from staffdetail,staff where staffdetail.staff_id=staff.staff_id ";
                        $go_query=mysqli_query($connection,$query);
                        while($row=mysqli_fetch_array($go_query))
                    
                        {
                            $staffdetailid=$row['staffdetail_id']; 
                            $username=$row['username'];
                            $speciality=$row['speciality'];
                            $p1=$row['professional1'];
                            $p2=$row['professional2'];
                            $p3=$row['professional3'];
                            $c1=$row['certification1'];
                            $c2=$row['certification2'];
                            $c3=$row['certification3'];
                            $year=$row['experience_year'];
                            $photo=$row['photo'];
                            echo "<tr>";
                            echo "<td><img src='../Photo/{$photo}' alt='$photo' width='110' height='100'></td>";
                            echo "<td>{$staffdetailid}</td>";
                            echo "<td>{$username} ({$speciality})</td>";
                            echo "<td>{$p1}</td>";
                            echo "<td>{$p2}</td>";
                            echo "<td>{$p3}</td>";
                            echo "<td>{$c1}</td>";
                            echo "<td>{$c2}</td>";
                            echo "<td>{$c3}</td>";
                            echo "<td>{$year}</td>";
                            echo "<td>
                                <a href='addstaffdetail.php' class='btn btn-outline-warning btn-sm'><i class='bi bi-plus-circle-dotted'></i></a>
                                <a href='staffdetailedit.php?action=edit&sdid={$staffdetailid}' class='btn btn-outline-info btn-sm'><i class='bi bi-arrow-bar-up'></i></a>
                                <a href='staffdetail.php?action=delete&sdid={$staffdetailid}' class='btn btn-outline-danger btn-sm'><i class='bi bi-trash3'></i></a>
                            </td>";
                            echo "</tr>";
                        }
                    ?>
                    
                </table>
            </div>
        </div>
    </main>
</body>
</html>