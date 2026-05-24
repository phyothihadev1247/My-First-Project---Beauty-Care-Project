<?php
     include 'conn.php';
     include 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog List</title>
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
            
            delBlog();
        }
    ?>
    <br>
    <br>
    <br>
    <main class="container">
        <div class="row mt-3">
            <div class="col-md-4">
                <h3>Blog Lists</h3>
            </div>
        </div>

        <div class="row mt-3 justify-content-center">
            <div class="col-md-12">
                <table class="table table-primary table-hover table-striped">
                    <tr class="table-warning">
                        <th>Photo</th> 
                        <th>No</th>
                        <th>Author Name</th>
                        <th>Blog Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        $query="Select blogs.*,author.* from blogs,author where blogs.author_id=author.author_id order by blog_id desc";
                        $go_query=mysqli_query($connection,$query);
                        while($row=mysqli_fetch_array($go_query))
                    
                        {
                            $blogid=$row['blog_id']; 
                            $authorname=$row['authorname'];
                            $title=$row['title'];
                            $content=$row['content'];
                            $photo=$row['photo'];
                            echo "<tr>";
                            echo "<td><img src='../Photo/{$photo}' alt='$photo' width='110' height='100'></td>";
                            echo "<td>{$blogid}</td>";
                            echo "<td>{$authorname}</td>";
                            echo "<td>{$title}</td>";
                            echo "<td>{$content}</td>";
                            echo "<td>
                                <a href='addblog.php' class='btn btn-outline-warning btn-sm'><i class='bi bi-plus-circle-dotted'></i></a>
                                <a href='blogedit.php?action=edit&bid={$blogid}' class='btn btn-outline-info btn-sm'><i class='bi bi-arrow-bar-up'></i></a>
                                <a href='blog.php?action=delete&bid={$blogid}' class='btn btn-outline-danger btn-sm'><i class='bi bi-trash3'></i></a>
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