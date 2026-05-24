<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Medical History Form</title>
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
            $historyid=$_GET['hid'];
            $query="Select * from medicalhistory where history_id='$historyid'";
            $go_query=mysqli_query($connection,$query);
            while($row=mysqli_fetch_array($go_query))
            {
                 $historyid=$row['history_id'];
                 $history_patient_id=$row['patient_id'];
                $condition=$row['conditions'];
                $treatment=$row['treatment'];
                $date=$row['date'];
                $note=$row['note'];
            }
            }

      if ( isset($_POST['btnupdateHistory'])) {
        updateHistory();
      }
    ?>
            <br>
            <br>
    <main class="container-sm rounded-4 border mt-5 mb-3">
            <h3 class="text-center p-2">Edit Medical History Form</h3>
            <div class="row align-items-center bg-transparent rounded-2">
            <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label fw-bold">Patient Name</label>
                <select name="pname" id="" class="form-control bg-transparent fw-normal p-2">
                            <?php
                             $query="Select * from patients"; 
                                $go_query=mysqli_query($connection,$query);
                                while($row=mysqli_fetch_array($go_query))
                                 {
                                 $patientid=$row['patient_id'];
                                 $username=$row['username'];
                                 if($history_patient_id == $patientid)
                                     {
                                       echo "<option value={$patientid} selected>{$username} </option>";
                                      }
                                    else
                                    {
                                        echo "<option value={$patientid}>{$username}</option>";
                                    }
    
                                        }
                                    ?> 
                </select>
             </div>
            <div class="mb-3">
                <label for="" class="form-label fw-bold">Condition</label>
                    <input type="text"  name="con" value="<?php echo $condition?>" id="" class="form-control bg-transparent fw-normal p-2">
                </div>
                <div class="mb-3">
                <label for="" class="form-label fw-bold">Treatment</label>
                    <input type="text" name="tre" value="<?php echo $treatment?>" id="" class="form-control bg-transparent fw-normal p-2">
            </div>
            <div class="mb-3">
                <label for="" class="form-label fw-bold">Date</label>
                    <input type="text" placeholder="2000-00-00" name="date" value="<?php echo $date  ?>" id="" class="form-control bg-transparent fw-normal p-2">
                </div>
            <div class="mb-3">
                <label for="" class="form-label fw-bold">Note</label>
                    <input type="text" name="note" value="<?php echo $note?>" id="" class="form-control bg-transparent fw-normal p-2">
            </div>
            <button type="submit" name="btnupdateHistory" class="btn btn-warning w-100 my-2">Update History</button>
          </form>
          </div> 
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
