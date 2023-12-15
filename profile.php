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
    <div class="user" style="display: flex;align-items: center;justify-content: center;font-size: 50px;">
        <i class="fa-solid fa-user"></i>
        <h1 class="text-center">Profile Info</h1>
    </div>
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
            <form action="../Main/admin/code.php" method="POST" enctype="multipart/form-data">
                <div class="userprofile">


                    <div class="m-3">
                        <label for="name" class="form-label">First Name: </label>
                        <input type="text" class="form-control" value="<?= $user['fname'] ?>" name="fname" disabled required>
                    </div>
                    <div class="m-3">
                        <label for="name" class="form-label">Last Name: </label>
                        <input type="text" class="form-control" value="<?= $user['lname'] ?>" name="lname" disabled required>
                    </div>
                    <div class="m-3">
                        <label for="name" class="form-label">Middle Name: </label>
                        <input type="text" class="form-control" value="<?= $user['mdname'] ?>" name="mdname" disabled required>
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


                    <div class="col md-6">
                        <label for="">Upload Proof of payment</label>
                        <input type="File" name="image" class="form-control">

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
            <?php include('include/footer.php'); ?>