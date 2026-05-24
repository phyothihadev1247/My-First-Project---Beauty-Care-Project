<?php
    include 'conn.php';
    include 'function.php'; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Add Staff Detail Form</title>
    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <style>

        * {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

body {
  font-family: Georgia, serif, Arial, sans-serif;
  background-image: linear-gradient(to left top, rgb(158, 3, 201), rgb(22, 200, 160));
}
main{
     background-color: transparent;
     box-sizing: border-box;
      backdrop-filter: blur(40px);
}
    </style>
  </head>
  <body>
    <?php
      include 'header.php';
    ?>
    <main>
    <?php  
            if(isset($_POST['btnaddstaffdetail']))
            {
                
                addStaffdetail();
            }  
        ?>
      <section class="container-sm mt-5">
        <br>
        <br>
        <h3>Add Staff Detail Form</h3><br>
        <form method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="" class="form-label fw-bold">Doctor Name</label>
            <select name="sname" id="" class="form-control">
                    <?php
                                    $query="Select * from staff";
                                    $go_query=mysqli_query($connection,$query);
                                    while($row=mysqli_fetch_array($go_query))
                                    {
                                        $staffid=$row['staff_id'];
                                        $username=$row['username'];
                                        {
                                            echo "<option value={$staffid}>{$username}</option>";
                                        }
                                    }
                    ?>
            </select>
            </div>
          <div class="mb-3">
            <label for="" class="form-label fw-bold">Professional 1</label>
            <input type="text" name="p1" id="" class="form-control">
         </div>
         <div class="mb-3">
            <label for="" class="form-label fw-bold">Professional 2</label>
            <input type="text" name="p2" id="" class="form-control">
         </div>
         <div class="mb-3">
            <label for="" class="form-label fw-bold">Professional 3</label>
            <input type="text" name="p3" id="" class="form-control">
         </div>
         <div class="mb-3">
            <label for="" class="form-label fw-bold">Certification 1</label>
            <input type="text" name="c1" id="" class="form-control">
         </div>
         <div class="mb-3">
            <label for="" class="form-label fw-bold">Certification 2</label>
            <input type="text" name="c2" id="" class="form-control">
         </div>
         <div class="mb-3">
            <label for="" class="form-label fw-bold">Certification 3</label>
            <input type="text" name="c3" id="" class="form-control">
         </div>
         <div class="mb-3">
            <label for="" class="form-label fw-bold">Experience Year</label>
            <input type="text" name="eyear" id="" class="form-control">
         </div>
         <div class="mb-3">
            <label class="form-label fw-bold">Photo</label>
            <input type="file" name="photo" id="" class="form-control bg-transparent fw-bold p-2">
        </div>
        <button type="submit" name="btnaddstaffdetail" class="btn btn-warning w-100 my-3 fw-bold">Add Staff Detail</button>
        </form>
        <br>
      </section>
    </main>
    <!-- main -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
