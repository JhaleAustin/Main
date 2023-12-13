<?php
    session_start();
    include('database/dbcon.php');
    include('function/myfunction.php');
    

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //username and password sent from form
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $password =  mysqli_real_escape_string($con,$_POST['password']);

        $sql = "SELECT * FROM user WHERE email = '$email' and password = '$password'";
        $result = mysqli_query($con,$sql);
        //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        //$active = $row['active'];
        
        //$count = mysqli_num_rows($result);

        //if result matched $email and $passwork , table row must be 1 row

    //     if($count == 1 ){
    //         $_SESSION['login_user'] = $email;

    //         header("location:index.php");

            

    //     }
    //     else{
    //         $error = "Your Email or Password is invalid";
    //         header("location:login.php");
    //     }

    // }
    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['auth'] = true;

        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $username = $row['email'];
        $userfname = $row['fname'];
        $userlname = $row['lname'];
        $role_as = $row['role_as'];
        $id = $row['id'];

        $_SESSION['login_user'] = [
            'email' => $username,
            'fname' => $userfname,
            'lname' => $userlname,
            'id' => $id

        ];

        $_SESSION['role_as'] = $role_as; 
        if($role_as == 1 )
        {
        redirect("admin/indexadmin.php","Welcome to dashboard" );
        
        }
        else
        {
        redirect("index.php","Logged in Successfully" );
            
        }

        
    }
    else
    {
        redirect("Login.php","Invalid Credentials" );
        
    }

}

    
    ?>
    