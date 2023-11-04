<?php
    
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

    $user_query = "INSERT INTO user (fname, lname, mdname, gender, email, password, phone)
        VALUES ('$fname', '$lname', '$mdname', '$gender', '$email', '$password', '$phone')";
        
    $user_query_run = mysqli_query($con, $user_query);
    
    //pipindutin ko reset button ni jose mamayang 3am
    if($user_query_run)
    {
        redirect("Login.php", "User Added Successfully");
    }
    else
    {
        redirect("Login.php", "Something Went Wrong");
    }
     }
    
    
    
?>


