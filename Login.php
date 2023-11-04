<?php 
include('include/header.php'); 
session_start();
echo "". $_SESSION ['message'];   
?>
<div class="container mt-5">
    <h1 class="text-center">Registration</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="code.php" method="post" enctype="multipart/form-data">
                <div class="m-3">
                    <label for="name" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="firstName" required>
                </div>
                <div class="m-3">
                    <label for="name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lastName" required>
                </div>
                <div class="m-3">
                    <label for="name" class="form-label">Middle Name</label>
                    <input type="text" class="form-control" name="middleName" required>
                </div>
                <div class="m-3">
                    <label for="" class="form-label">Gender</label>
                    <select class="form-select" name="gender" aria-label="Default select example" required>
                        <option selected></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="m-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="m-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="m-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" name="phone" required>
                </div>
                <button type="submit" name="register" class="btn btn-primary m-3 justify-content-end">Register</button>
            </form>
        </div>
    </div>
</div>
<?php include('include/footer.php');
 $_SESSION['message'] = "";?>