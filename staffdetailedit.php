<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Staff Detail Form</title>
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
            $staffdetailid=$_GET['sdid'];
            $query="Select * from staffdetail where staffdetail_id='$staffdetailid'";
            $go_query=mysqli_query($connection,$query);
            while($row=mysqli_fetch_array($go_query))
            {
                 $staffdetailid=$row['staffdetail_id'];
                 $staffdetail_staff_id=$row['staff_id'];
                $p1=$row['professional1'];
                $p2=$row['professional2'];
                $p3=$row['professional3'];
                $c1=$row['certification1'];
                $c2=$row['certification2'];
                $c3=$row['certification3'];
                $year=$row['experience_year'];
                $photo=$row['photo'];
            }
            }

      if ( isset($_POST['btnupdateStaffdetail'])) {
        updateStaffdetail();
      }
    ?>
            <br>
            <br>
    <main class="container-sm rounded-4 border mt-5 mb-3">
            <h3 class="text-center p-2">Edit Staff Detail Form</h3>
            <div class="row align-items-center bg-transparent rounded-2">
            <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label fw-bold">Doctor Name</label>
                <select name="sname" id="" class="form-control bg-transparent fw-normal p-2">
                            <?php
                             $query="Select * from staff"; 
                                $go_query=mysqli_query($connection,$query);
                                while($row=mysqli_fetch_array($go_query))
                                 {
                                 $staffid=$row['staff_id'];
                                 $username=$row['username'];
                                 if($staffdetail_staff_id == $staffid)
                                     {
                                       echo "<option value={$staffid} selected>{$username} </option>";
                                      }
                                    else
                                    {
                                        echo "<option value={$staffid}>{$username}</option>";
                                    }
                                        }
                                    ?> 
                </select>
             </div>
            <div class="mb-3">
                <label for="" class="form-label fw-bold">Professional 1</label>
                    <input type="text"  name="p1" value="<?php echo $p1?>" id="" class="form-control bg-transparent fw-normal p-2">
            </div>
            <div class="mb-3">
                <label for="" class="form-label fw-bold">Professional 2</label>
                    <input type="text"  name="p2" value="<?php echo $p2?>" id="" class="form-control bg-transparent fw-normal p-2">
            </div>
            <div class="mb-3">
                <label for="" class="form-label fw-bold">Professional 3</label>
                    <input type="text"  name="p3" value="<?php echo $p3?>" id="" class="form-control bg-transparent fw-normal p-2">
            </div>
            <div class="mb-3">
                <label for="" class="form-label fw-bold">Certification 1</label>
                    <input type="text"  name="c1" value="<?php echo $c1?>" id="" class="form-control bg-transparent fw-normal p-2">
            </div>
            <div class="mb-3">
                <label for="" class="form-label fw-bold">Certification 2</label>
                    <input type="text"  name="c2" value="<?php echo $c2?>" id="" class="form-control bg-transparent fw-normal p-2">
            </div>
            <div class="mb-3">
                <label for="" class="form-label fw-bold">Certification 3</label>
                    <input type="text"  name="c3" value="<?php echo $c3?>" id="" class="form-control bg-transparent fw-normal p-2">
            </div>
            <div class="mb-3">
                <label for="" class="form-label fw-bold">Experience Year</label>
                    <input type="text"  name="eyear" value="<?php echo $year?>" id="" class="form-control bg-transparent fw-normal p-2">
            </div> 
            <div class="mb-3">
                <label for="photoId" class="form-label">Photo</label>
                <input type="file" name="photo" value="<?php echo $photo ?>" class="form-control bg-transparent fw-bold p-2 mb-3" id="photoId">

                <img src="../Photo/<?php echo $photo ?>" alt='<?php echo $photo ?>' width='110' height='100'/>
              <p>Current Image: <?php echo $photo ?></p>
            </div>   
            <button type="submit" name="btnupdateStaffdetail" class="btn btn-warning w-100 my-2">Update Staffdetail</button>
          </form>
          </div> 
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
