<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Patients</title>
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
        $authorid=$_GET['aid'];
        $query="Select * from author where author_id='$authorid'";
        $go_query=mysqli_query($connection,$query);
            while($row=mysqli_fetch_array($go_query))
            {
        $authorid=$row['author_id'];
        $authorname=$row['authorname'];
        $email=$row['email'];
        $phone=$row['phone'];
        $bio=$row['bio'];
            }
            }

      if ( isset($_POST['btnupdateAuthor'])) {
        updateAuthor();
      }
    ?>
            <br>
            <br>
    <main class="container-sm rounded-4 border mt-5 mb-3">
            <h3 class="text-center p-2">Edit Author Form</h3>
            <div class="row align-items-center bg-transparent rounded-2">
            <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label fw-bold">Author Name</label>
                <input type="text" name="aname" value="<?php echo $authorname?>" id="" class="form-control bg-transparent fw-normal p-2">
            </div>
            <div class="mb-3">
                <label for="" class="form-label fw-bold">Email</label>
                <input type="email" name="email" value="<?php echo $email?>" id="" class="form-control bg-transparent fw-normal p-2">
            </div>
            <div class="mb-3">
                <label for="" class="form-label fw-bold">Phone Number</label>
                <input type="text" name="phone" value="<?php echo $phone?>" id="" class="form-control bg-transparent fw-normal p-2">
            </div>
            <div class="mb-3">
                <label for="" class="form-label fw-bold">Bio</label>
                <input type="text" name="bio" value="<?php echo $bio?>" id="" class="form-control bg-transparent fw-normal p-2">
            </div>
            <button type="submit" name="btnupdateAuthor" class="btn btn-warning w-100 my-2">Update Author</button>
          </form>
          </div> 
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
