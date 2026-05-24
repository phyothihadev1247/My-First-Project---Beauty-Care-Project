<?php
function create_accu()
{
    global $connection;
    $errors=[];

    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $date=$_POST['date'];
    $gender=$_POST['gender'];

    if(empty($username))
    {
        $errors['username']='User Name must be entered';
    }
    else if(strlen($username)<3)
    {
        $errors['username']='User Name need to be longer';
    }

    if(empty($password))
    {
        $errors['password']='Enter Password';
    }
    else if(strlen($password)<3)
    {
        $errors['password']='Password need to be longer';
    }


    if(empty($cpassword))
    {
        $errors['cpassword']='Confirm Password must be entered';
    }
    else if($password != $cpassword)
    {
        $errors['cpassword']='Password do not match';
    }

    if(empty($email))
    {
        $errors['email']='Email must be entered';
    }

    if(empty($phone))
    {
        $errors['phone']='Phone Number must be entered';
    }
    
    if(empty($date))
    {
        $errors['date']='Date must be entered';
    }

    if(empty($gender))
    {
        $errors['gender']='Gender must be entered';
    }
    

    if(empty($errors))
    {
        $hpass=md5($password);
        $query="Select * from patients where username='$username'";
        $user_query=mysqli_query($connection,$query);
        $count=mysqli_num_rows($user_query);

        if($count>0)
        {
            $errors['username']='This username is already taken'; 
        }
        else
        {
            $query="insert into patients(username,password,email,phone,date_of_birth,gender) values 
            ('$username','$hpass','$email','$phone','$date','$gender')";
            $go_query=mysqli_query($connection,$query);

            if(!$go_query)
            {
                die("QUERY FAILED ".mysqli_error($connection));
            }
            //header("location:login.php");
        }
    }
    return $errors;
    
}
?>