<?php 
include('session.php');
include('include/header.php');

if(isset($_SESSION['auth']))
{
    $_SESSION['message'] = "You are already logged in";
    header('Location: index.php');
    exit();
}
?>


<div class="container mt-5">
    <h1 class="text-center">Log in</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="codelogin.php" method="post" enctype="multipart/form-data">
                <div class="m-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="m-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="m-3">
                    <a href="registration.php">Dont have a Account? Register here</a>
                </div>

                <button type="submit" name="login" class="btn btn-primary m-3 justify-content-end">Log in</button>
            </form>
        </div>
    </div>
</div>
<?php include('include/footer.php'); ?>