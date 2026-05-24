<?php
     include 'conn.php';
     include 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author List</title>
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
            
            delAuthor();
        }
    ?>
    <br>
    <br>
    <br>
    <main class="container">
        <div class="row mt-3">
            <div class="col-md-4">
                <h3>Author Lists</h3>
            </div>
        </div>

        <div class="row mt-3 justify-content-center">
            <div class="col-md-12">
                <table class="table table-primary table-hover table-striped">
                    <tr class="table-warning"> 
                        <th>No</th>
                        <th>Author Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Bio</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        $query = "Select * from author order by author_id desc";
                        $go_query=mysqli_query($connection,$query);
                        while($row=mysqli_fetch_array($go_query))
                    
                    {
                        $authorid=$row['author_id'];
                        $authorname=$row['authorname'];
                        $email=$row['email'];
                        $phone=$row['phone']; 
                        $bio=$row['bio'];

                        echo "<tr>";
                        echo "<td>{$authorid}</td>";
                        echo "<td>{$authorname}</td>";
                        echo "<td>{$email}</td>";
                        echo "<td>{$phone}</td>";
                        echo "<td>{$bio}</td>";
                        echo "<td>
                                <a href='addauthor.php' class='btn btn-outline-warning btn-sm'><i class='bi bi-plus-circle-dotted'></i></a>
                                <a href='authoredit.php?action=edit&aid={$authorid}' class='btn btn-outline-info btn-sm'><i class='bi bi-arrow-bar-up'></i></a>
                                <a href='author.php?action=delete&aid={$authorid}' class='btn btn-outline-danger btn-sm'><i class='bi bi-trash3'></i></a>
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