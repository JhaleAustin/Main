<?php
session_start();
include('../database/dbcon.php');
include('../function/myfunction.php');


if(isset($_POST['submit']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mdname = $_POST['mdname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];


    $image = $_FILES['image']['name'];

    $path = "../Main/uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time(). '.'.$image_ext;

    $user_query = "INSERT  INTO user_apply (fname, lname, mdname, gender, email,  phone, image)
    VALUES ('$fname', '$lname', '$mdname', '$gender', '$email', '$phone', '$image'";

    $user_query_run = mysqli_query($con, $user_query);

    if($user_query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);

        redirect("../profile.php", "Uploaded Succesfully");
    }
    else
    {
        redirect("../profile.php", "something went wrong");
    }

}


?>