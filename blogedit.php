<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Blog Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            background-image: linear-gradient(to left top, rgb(158, 3, 201), rgb(22, 200, 160));
        }
        main{
            background-color: rgba(255, 255, 255, 0.05);
            box-sizing: border-box;
            backdrop-filter: blur(40px);
        }
        img{
          border-radius: 200px;
        }
       
    </style>
</head>
    
  <body>
    <?php
      include 'header.php';
      include 'conn.php';
      include 'function.php';

      if(isset($_GET['action']) && $_GET['action']=='edit')
            {
            $blogid=$_GET['bid'];
            $query="Select * from blogs where blog_id='$blogid'";
            $go_query=mysqli_query($connection,$query);
            while($row=mysqli_fetch_array($go_query))
            {
            $blogid=$row['blog_id'];
            $blog_author_id=$row['author_id'];
            $title=$row['title'];
            $content=$row['content'];
            $photo=$row['photo'];
            }
            }

      if ( isset($_POST['btnupdateBlog'])) {
        updateBlog();
      }
    ?>
            <br>
            <br>
    <main class="container-sm rounded-4 border mt-5 mb-3">
            <h3 class="text-center p-2">Edit Blog Form</h3>
            <div class="row align-items-center bg-transparent rounded-2">
            <form method="post" enctype="multipart/form-data">
             <div class="mb-3">
                                <label for="" class="form-label fw-bold">Author Name</label>
                                <select name="aname" id="" class="form-control bg-transparent fw-normal p-2">

                                    <?php
                                        $query="Select * from author";
                                    
                                        $go_query=mysqli_query($connection,$query);
                                        while($row=mysqli_fetch_array($go_query))
                                        {
                                            $authorid=$row['author_id'];
                                            $authorname=$row['authorname'];
                                            if($blog_author_id == $authorid)
                                            {
                                                echo "<option value={$authorid} selected>{$authorname} </option>";
                                            }
                                            else
                                            {
                                                echo "<option value={$authorid}>{$authorname}</option>";
                                            }
    
                                        }
                                    ?> 
                                </select>
             </div>
            <div class="mb-3">
                 <label for="" class="form-label fw-bold">Blog Title</label>
                      <input type="text" name="title" value="<?php echo $title?>" id="" class="form-control bg-transparent fw-normal p-2">
            </div>
            <div class="mb-3">
                  <label for="" class="form-label fw-bold">Content</label>
                        <input type="text" name="content" value="<?php echo $content?>" id="" class="form-control bg-transparent fw-normal p-2">
            </div>
            <div class="mb-3">
                <label for="photoId" class="form-label">Photo</label>
                <input type="file" name="photo" value="<?php echo $photo ?>" class="form-control bg-transparent fw-bold p-2 mb-3" id="photoId">
                <img src="../Photo/<?php echo $photo ?>" alt='<?php echo $photo ?>' width='110' height='100'/>
              <p>Current Image: <?php echo $photo ?></p>
            </div>
            <button type="submit" name="btnupdateBlog" class="btn btn-warning w-100 my-2">Update Blog</button>
          </form>
          </div> 
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
