<?php
include('session.php');
include('database/dbcon.php');
include('../Main/function/myfunction.php');
include('include/header.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID</title>
</head>



<body>
    <div style="text-align: center;font-size: 35px;">
        <h3>Your Reference No.</h3>
        <?php
        $user = getONE("user", $_SESSION['login_user']['id']);
        echo $user['ref_no']

        ?>
        <h5>Thank you for applying for the entrance exam</h5>
        <a href="index.php" class="btn  btn-primary text-black text-decoration-none btn-block float-left fs-5">Home</a>
    </div>

</body>














































<?php include('include/footer.php'); ?>