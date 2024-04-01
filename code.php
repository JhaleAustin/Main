<?php
    session_start();
    include('function/function.php');
    include('database/dbcon.php');
    
    if(isset($_POST['register']))
    {
    
    

    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $mdname = $_POST['middleName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $cpassword = $_POST['cpassword'];


    //check email if already registered
    $check_email_query = "SELECT email FROM user WHERE email='$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0)
    {
        $_SESSION['message'] = "Email already exist";
        header('Location: registration.php');
    }
    else
    {
        if($password == $cpassword){
            $ref_no =  bin2hex(random_bytes(5));
            $user_query = "INSERT INTO user (fname, lname, mdname, gender, email, password, phone, ref_no)
            VALUES ('$fname', '$lname', '$mdname', '$gender', '$email', '$password', '$phone', '$ref_no')";
           $user_query_run = mysqli_query($con, $user_query);
           
           if($user_query_run)
           {
               $_SESSION['message'] = "Registerd Successfully";
               header('location: index.php');
           }
           else
           {
               $_SESSION['message'] = "Something went wrong";
               header('Location: registration.php');
           }
        }
        else{
            $_SESSION['message'] = "Password do not match";
            header('Location: registration.php');
    
        }
    }

    
     }
    
    
    
?>


