<?php
session_start();
include('include/header.php');

if (isset($_SESSION['auth'])) {
    $_SESSION['message'] = "You are already logged in";
    header('Location: index.php');
    exit();
}

?>

<style>
.backbutton{
    background-color: #ddd;
  color: black;
}

</style>

<button onclick="history.go(-1);">&laquo; Previous </button>
<div class="container mt-5">
    <h1 class="text-center">Registration</h1>
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
            <form action="code.php" method="post" enctype="multipart/form-data">
                <div class="m-3">
                    <label for="name" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="firstName" required placeholder="Enter your First Name">
                </div>
                <div class="m-3">
                    <label for="name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lastName" required placeholder="Enter your Last Name">
                </div>
                <div class="m-3">
                    <label for="name" class="form-label">Middle Name</label>
                    <input type="text" class="form-control" name="middleName" required placeholder="Enter your Middle Name">
                </div>
                
                <div class="m-3">
                    <label for="" class="form-label">Gender</label>
                    <select class="form-select" name="gender" aria-label="Default select example" required>
                        <option selected>
                        </option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="m-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required placeholder="Enter your Email">
                </div>
                <div class="m-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required placeholder="Enter your Password">
                </div>
                <div class="m-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="cpassword" class="form-control" name="password" required placeholder="Confirm Password">
                </div>
                <div class="m-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" name="phone" required placeholder="Enter your Phone Number">
                </div>
                <div class="m-3">
                    <a href="login.php">Log In here</a>

                </div>

                <button type="submit" name="register" class="btn btn-primary m-3 justify-content-end">Register</button>
            </form>
        </div>
    </div>
</div>
<?php include('include/footer.php');
$_SESSION['message'] = ""; ?>