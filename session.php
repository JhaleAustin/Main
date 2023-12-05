<?php
    session_start();
    include('database/dbcon.php');
    
    
    if(isset($_SESSION['login_user']) && !empty($_SESSION['login_user'])) {

        $user_check = $_SESSION['login_user']['email'];

        $ses_sql = mysqli_query($con,"SELECT * FROM user where email = '$user_check' ");
    
        $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    
        $login_session = $row['fname'] . ' ' .  $row['lname'];


     }

       


      
     


?>