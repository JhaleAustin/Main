
<?php
    include('database/dbcon.php');
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //username and password sent from form
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $password =  mysqli_real_escape_string($con,$_POST['password']);

        $sql = "SELECT id FROM user WHERE email = '$email' and password = '$password'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        //$active = $row['active'];
        
        $count = mysqli_num_rows($result);

        //if result matched $email and $passwork , table row must be 1 row

        if($count == 1 ){
            $_SESSION['login_user'] = $email;

            header("location:index.php");

            

        }
        else{
            $error = "Your Email or Password is invalid";
            header("location:login.php");
        }

    }
    
    ?>
    