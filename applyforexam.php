<?php

include('session.php');
include('database/dbcon.php');
include('../Main/function/myfunction.php');
include('include/header.php');

//INSERT INTO user_apply (id, ref_no) VALUES ('1', 'qwerty')
?>
<?php
if (isset($_SESSION['auth'])) {

} else {
    redirect("Login.php", "Login to continue");
}

?>
<div class="container mt-5">
    <h1 class="text-center">Entrance Exam form</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php
            if (isset($_SESSION['message'])) {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong> <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                unset($_SESSION['message']);
            }

            ?>
            <?php
            $user = getONE("user", $_SESSION['login_user']['id']);


            ?>

            <div class="m-3">
                <label for="name" class="form-label">First Name: </label>
                <input type="text" class="form-control" value="<?= $user['fname'] ?>" name="firstName" disabled required>
            </div>
            <div class="m-3">
                <label for="name" class="form-label">Last Name: </label>
                <input type="text" class="form-control" value="<?= $user['lname'] ?>" name="lastName" disabled required>
            </div>
            <div class="m-3">
                <label for="name" class="form-label">Middle Name: </label>
                <input type="text" class="form-control" value="<?= $user['mdname'] ?>" name="middleName" disabled required>
            </div>
            <div class="m-3">
                <label for="name" class="form-label">Gender: </label>
                <input type="text" class="form-control" value="<?= $user['gender'] ?>" name="gender" disabled required>
            </div>
            <div class="m-3">
                <label for="email" class="form-label">Email: </label>
                <input type="email" class="form-control" value="<?= $user['email'] ?>" name="email" disabled required>
            </div>
            <div class="m-3">
                <label for="phone" class="form-label">Phone Number: </label>
                <input type="number" class="form-control" value="<?= $user['phone'] ?>" name="phone" disabled required>
            </div>


            <a href="succespage.php" class="btn  btn-primary text-black text-decoration-none btn-block float-left fs-5">Apply</a>
        </div>
    </div>

    <?php include('include/footer.php'); ?>