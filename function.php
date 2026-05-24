<?php

function addStaff()
{
    global $connection; 
    $username=$_POST['uname'];
    $password=$_POST['pword'];
    //$cpassword=$_POST['cword'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $role=$_POST['role'];
    $speciality=$_POST['special'];

    
    /*if($password!=$cpassword)
    {
        echo "<script>window.alert('Password and Confirm Password are must be same')</script>";
    }*/
    if($username!="" && $password!="" )
    {
        $query="Select * from staff where username='$username' and password='$password'";
        $ch_query=mysqli_query($connection,$query);
        $count=mysqli_num_rows($ch_query);
        if($count>0)
        {
            echo "<script>window.alert('This record is already exists')</script>";
        }
        else
        {
            $hash=md5($password);
            $query="insert into staff(username,password,email,phone,role,speciality)
            values('$username','$hash','$email','$phone','$role','$speciality')";
            $go_query=mysqli_query($connection,$query);
            if(!$go_query)
            {
                die("QUERY FAILED ".mysqli_error(connection));
            }
            header("location:staff.php");
        }
    }   
}

function delStaff()
{
    global $connection;
    $staffid=$_GET['sid'];
    $query="Delete from staff where staff_id='$staffid'";
    $go_query=mysqli_query($connection,$query);
    
}

function updateStaff()
{
    global $connection;
    $staffid=$_GET['sid'];
    $username=$_POST['uname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $role=$_POST['role'];
    $special=$_POST['special'];

    $query="update staff set username='$username', email='$email', phone='$phone', role='$role', speciality='$special' where staff_id='$staffid'";
    $go_query=mysqli_query($connection,$query);
    if(!$go_query)
    {
        die("QUERY FAILED ".mysqli_error($connection));
    }
    header("location:staff.php");
}

function addPatient()
{
    global $connection; 
    $username=$_POST['uname'];
    $password=$_POST['pword'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $date=$_POST['date'];
    $gender=$_POST['gender'];
    
    if($username=="")
    {
        echo "<script>window.alert('Please enter username')</script>";

    }
    else if($password=="")
    {
        echo "<script>window.alert('Please enter password')</script>";

    }
    else if($username !="" && $password !="")
    {
        $hpass=md5($password);
        $query="Select * from patients where username='$username' and password='$password'";
        $ch_query=mysqli_query($connection,$query);
        $count=mysqli_num_rows($ch_query);
            if( $count>0)
            {
                echo "<script>window.alert('This user is already exists')</script>";
            }
            else
            {
                $query="insert into patients(username,password,email,phone,date_of_birth,gender)
                values('$username','$hpass','$email','$phone','$date','$gender')";
                $go_query=mysqli_query($connection,$query);
                if(!$go_query)
                {
                    die("QUERY FAILED ".mysqli_error(connection));
                }
               header("location:patient.php");
        }
     }    
}

function delPatient()
{
    global $connection;
    $patientid=$_GET['pid'];
    $query="Delete from patients where patient_id='$patientid'";
    $go_query=mysqli_query($connection,$query);
    
}

function updatePatient()
{
    global $connection;
    $patientid=$_GET['pid'];
    $username=$_POST['uname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $date=$_POST['date'];
    $gender=$_POST['gender'];

    $query="update patients set username='$username', email='$email', phone='$phone', date_of_birth='$date', gender='$gender' where patient_id='$patientid'";
    $go_query=mysqli_query($connection,$query);
    if(!$go_query)
    {
        die("QUERY FAILED ".mysqli_error($connection));
    }
    header("location:patient.php");
}



function addtreatment()
{
    global $connection;
    $treatmentname=$_POST['tname'];
    $staffname=$_POST['sname'];
    $description=$_POST['des'];
    $duration=$_POST['dur'];
    $price=$_POST['price'];
    $photo=$_FILES['photo']['name'];

    if($treatmentname=="")
    {
        echo "<script>window.alert('Please Enter Treatment Name')</script>";

    }
    elseif($staffname=="")
    {
        echo "<script>window.alert('Please Enter Doctor Name')</script>";

    }
    elseif($description=="")
    {
        echo "<script>window.alert('Please Enter Description')</script>";

    }
    elseif(is_numeric($duration)==false)
    {
        echo "<script>window.alert('Please Enter duration time is numeric value')</script>";
    }
    elseif(is_numeric($price)==false)
    {
        echo "<script>window.alert('Please Enter Treatment Price is numeric value')</script>";
    }
    elseif($photo=="")
    {
        echo "<script>window.alert('Choose Treatment Photo')</script>";
    }

    // empty (or) duplicate (or) SQL Statement
    
    else if($treatmentname !="" && $photo !="")
    {
        $query="Select * from treatments where name='$treatmentname' and photo='$photo'";
        $ch_query=mysqli_query($connection,$query);
        $count=mysqli_num_rows($ch_query);//0 or 1
            if( $count>0)
            {
                echo "<script>window.alert('This treatment name is already exists')</script>";
            }
            else
            {
                $query="insert into treatments(staff_id,name,description,duration,price,photo)
                values('$staffname','$treatmentname','$description','$duration','$price','$photo')";
                $go_query=mysqli_query($connection,$query);
                    if(!$go_query)
                    {
                        die("QUERY FAILED ".mysqli_error($connection));
                    }
                    else
                    {
                    move_uploaded_file($_FILES['photo']['tmp_name'],'../Photo/'.$photo);
                    }
                    header("location:treatment.php");
        }
     }    
}

function delTreatment()
{
    global $connection;
    $treatmentid=$_GET['tid'];
    $query="Delete from treatments where treatment_id='$treatmentid'";
    $go_query=mysqli_query($connection,$query);
    
}

function updateTreatment()
{
    global $connection;
    $treatmentid=$_GET['tid'];
    $staffname=$_POST['sname'];
    $treatmentname=$_POST['tname'];
    $description=$_POST['des'];
    $duration=$_POST['dur'];
    $price=$_POST['price'];
    $photo=$_FILES['photo']['name'];

    if(!$photo)
    {
        $query="update treatments set staff_id='$staffname',name='$treatmentname',description='$description',duration='$duration',price='$price' where treatment_id='$treatmentid'";
    }
    else
    {
        $query="update treatments set staff_id='$staffname',name='$treatmentname',description='$description',duration='$duration',price='$price',photo='$photo' where treatment_id='$treatmentid'";
    }
    $go_query=mysqli_query($connection,$query);
    if(!$go_query)
    {
        die("QUERY FAILED ".mysqli_error($connection));
    }
    else
    {
        move_uploaded_file($_FILES['photo']['tmp_name'],'../Photo/'.$photo);
    }
    header("location:treatment.php");
}

function addAuthor()
{
    global $connection;
    $authorname=$_POST['aname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $bio=$_POST['bio'];

    if($authorname=="")
    {
        echo "<script>window.alert('Please Enter Author Name')</script>";

    }
    else if($authorname !="" && $email !="")
    {
        $query="Select * from author where authorname='$authorname' and email='$email'";
        $ch_query=mysqli_query($connection,$query);
        $count=mysqli_num_rows($ch_query);
            if( $count>0)
            {
                echo "<script>window.alert('This author name is already exists')</script>";
            }
            else
            {
                $query="insert into author(authorname,email,phone,bio)
                values('$authorname','$email','$phone','$bio')";
                $go_query=mysqli_query($connection,$query);
                    if(!$go_query)
                    {
                        die("QUERY FAILED ".mysqli_error(connection));
                    }
            header("location:author.php");
        }
     }    
}

function delAuthor()
{
    global $connection;
    $authorid=$_GET['aid'];
    $query="Delete from author where author_id='$authorid'";
    $go_query=mysqli_query($connection,$query);
    
}

function updateAuthor()
{
    global $connection;
    $authorid=$_GET['aid'];
    $authorname=$_POST['aname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $bio=$_POST['bio'];

    $query="update author set authorname='$authorname', email='$email', phone='$phone', bio='$bio' where author_id='$authorid'";
    $go_query=mysqli_query($connection,$query);
    if(!$go_query)
    {
        die("QUERY FAILED ".mysqli_error($connection));
    }
    header("location:author.php");
}

function addHistory()
{
    global $connection;
    $patientname=$_POST['pname'];
    $condition=$_POST['con'];
    $treatment=$_POST['tre'];
    $date=$_POST['date'];
    $note=$_POST['note']; 
    

    if($condition !="" && $treatment !="")
    {
        $query="Select * from medicalhistory where conditions='$condition'";
        $ch_query=mysqli_query($connection,$query);
        $count=mysqli_num_rows($ch_query);
        if($count>0)
        {
            echo "<script>window.alert('This history is already exists')</script>";
        }
        else
        {
            $query="insert into medicalhistory(patient_id,conditions,treatment,date,note)
            values('$patientname','$condition','$treatment','$date','$note')";
            $go_query=mysqli_query($connection,$query);
            if(!$go_query)
            {
                die("QUERY FAILED ".mysqli_error(connection));
            }
            header("location:history.php");
        }
    }
}

function delHistory()
{
    global $connection;
    $historyid=$_GET['hid'];
    $query="Delete from medicalhistory where history_id='$historyid'";
    $go_query=mysqli_query($connection,$query);
    
}

function updateHistory()
{
    global $connection;
    $historyid=$_GET['hid'];
    $patientname=$_POST['pname'];
    $condition=$_POST['con'];
    $treatment=$_POST['tre'];
    $date=$_POST['date'];
    $note=$_POST['note'];

    if(!$note)
    {
        $query="update medicalhistory set patient_id='$patientname', conditions='$condition',treatment='$treatment',date='$date' where history_id='$historyid'";
    }
    else
    {
        $query="update medicalhistory set patient_id='$patientname', conditions='$condition',treatment='$treatment',date='$date', note='$note' where history_id='$historyid'";
    }
    $go_query=mysqli_query($connection,$query);
    if(!$go_query)
    {
        die("QUERY FAILED ".mysqli_error($connection));
    }
    header("location:history.php");
}

function addBlog()
{
    global $connection;
    $authorname=$_POST['aname'];
    $title=$_POST['title'];
    $content=$_POST['content'];
    $photo=$_FILES['photo']['name'];

    if($authorname=="")
    {
        echo "<script>window.alert('Please Enter Author Name')</script>";
    }
    elseif($title=="")
    {
        echo "<script>window.alert('Please Enter Blog Title')</script>";
    }
    elseif($content=="")
    {
        echo "<script>window.alert('Please Enter Content')</script>";
    }
    elseif($photo=="")
    {
        echo "<script>window.alert('Choose Blog Photo')</script>";
    }
    if($title !="" && $photo !="")
    {
        $query="Select * from blogs where title='$title'and photo='$photo'";
        $ch_query=mysqli_query($connection,$query);
        $count=mysqli_num_rows($ch_query);
        if($count>0)
        {
            echo "<script>window.alert('This blog is already exists')</script>";
        }
        else
        {
            $query="insert into blogs(author_id,title,content,photo)";
            $query.="values('$authorname','$title','$content','$photo')";
            $go_query=mysqli_query($connection,$query);
                    if(!$go_query)
                    {
                        die("QUERY FAILED ".mysqli_error($connection));
                    }
                    else
                    {
                    move_uploaded_file($_FILES['photo']['tmp_name'],'../Photo/'.$photo);
                    }
                    header("location:blog.php");
        }
    }
}

function delBlog()
{
    global $connection;
    $blogid=$_GET['bid'];
    $query="Delete from blogs where blog_id='$blogid'";
    $go_query=mysqli_query($connection,$query);
    
}

function updateBlog()
{
    global $connection;
    $blogid=$_GET['bid'];
    $authorname=$_POST['aname'];
    $title=$_POST['title'];
    $content=$_POST['content'];
    $photo=$_FILES['photo']['name'];

    if(!$photo)
    {
        $query="update blogs set author_id='$authorname', title='$title', content='$content' where blog_id='$blogid'";
    }
    else
    {
        $query="update blogs set author_id='$authorname', title='$title',content='$content', photo='$photo' where blog_id='$blogid'";
    }
    $go_query=mysqli_query($connection,$query);
    if(!$go_query)
    {
        die("QUERY FAILED ".mysqli_error($connection));
    }
    else
    {
        move_uploaded_file($_FILES['photo']['tmp_name'],'../Photo/'.$photo);
    }
    header("location:blog.php");
}

function addStaffdetail()
{
    global $connection;
    $staffname=$_POST['sname'];
    $p1=$_POST['p1'];
    $p2=$_POST['p2'];
    $p3=$_POST['p3'];
    $c1=$_POST['c1'];
    $c2=$_POST['c2'];
    $c3=$_POST['c3'];
    $year=$_POST['eyear'];
    $photo=$_FILES['photo']['name'];

    if(is_numeric($year)==false)
    {
        echo "<script>window.alert('Please Enter year is numeric value')</script>";
    }
    elseif($photo=="")
    {
        echo "<script>window.alert('Choose doctor Photo')</script>";
    }

    if($p1 !="" && $p2 !="")
    {
        $query="Select * from staffdetail where professional1='$p1' and photo='$photo' ";
        $ch_query=mysqli_query($connection,$query);
        $count=mysqli_num_rows($ch_query);
        if($count>0)
        {
            echo "<script>window.alert('This fact is already exists')</script>";
        }
        else
        {
            $query="insert into staffdetail(staff_id,professional1,professional2,professional3,certification1,certification2,certification3,experience_year,photo)
            values('$staffname','$p1','$p2','$p3','$c1','$c2','$c3','$year','$photo')";
            $go_query=mysqli_query($connection,$query);
            if(!$go_query)
            {
                die("QUERY FAILED ".mysqli_error(connection));
            }
            else
                    {
                    move_uploaded_file($_FILES['photo']['tmp_name'],'../Photo/'.$photo);
                    }
                    header("location:staffdetail.php"); 
        }    
    }
}

function delStaffdetail()
{
    global $connection;
    $staffdetailid=$_GET['sdid'];
    $query="Delete from staffdetail where staffdetail_id='$staffdetailid'";
    $go_query=mysqli_query($connection,$query);
}

function updateStaffdetail()
{
    global $connection;
    $staffdetailid=$_GET['sdid'];
    $staffname=$_POST['sname'];
    $p1=$_POST['p1'];
    $p2=$_POST['p2'];
    $p3=$_POST['p3'];
    $c1=$_POST['c1'];
    $c2=$_POST['c2'];
    $c3=$_POST['c3'];
    $year=$_POST['eyear'];
    $photo=$_FILES['photo']['name'];

    if(!$photo)
    {
        $query="update staffdetail set staff_id='$staffname', professional1='$p1',professional2='$p2',professional3='$p3', certification1='$c1',certification2='$c2',certification3='$c3',experience_year='$year' where staffdetail_id='$staffdetailid'";
    }
    else
    {
        $query="update staffdetail set staff_id='$staffname', professional1='$p1',professional2='$p2',professional3='$p3', certification1='$c1',certification2='$c2',certification3='$c3', experience_year='$year',photo='$photo' where staffdetail_id='$staffdetailid'";
    }
    $go_query=mysqli_query($connection,$query);
    if(!$go_query)
    {
        die("QUERY FAILED ".mysqli_error($connection));
    }
    else
    {
        move_uploaded_file($_FILES['photo']['tmp_name'],'../Photo/'.$photo);
    }
    header("location:staffdetail.php");
}

function adminLogin()
{
    global $connection;
    $username=$_POST['username'];
    $password=$_POST['password'];
    $hpass=md5($password);

    $query="Select * from staff";
    $go_query=mysqli_query($connection,$query);
    while($out=mysqli_fetch_array($go_query))
    {
        $dbusername=$out['username'];
        $dbpassword=$out['password'];
        

        if($dbusername==$username && $dbpassword==$hpass )
        {
            $_SESSION['staff']=$username;
            header('location:book_mgmt.php');
        }
        else
        {
            echo "<script>window.alert('Invalid username and password')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
    }
    }
?>