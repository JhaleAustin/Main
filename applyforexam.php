<?php
include('session.php');
include('include/header.php');
include('database/dbcon.php');
include('../Main/function/myfunction.php');

//INSERT INTO user_apply (id, ref_no) VALUES ('1', 'qwerty')
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
                <label for="name" class="form-label"></label>
                <input type="text" class="form-control" value="<?= $user['fname'] ?>" name="firstName" disabled required>
            </div>
            <div class="m-3">
                <label for="name" class="form-label"></label>
                <input type="text" class="form-control" value="<?= $user['lname'] ?>" name="lastName" disabled required>
            </div>
            <div class="m-3">
                <label for="name" class="form-label"></label>
                <input type="text" class="form-control" value="<?= $user['mdname'] ?>" name="middleName" disabled required>
            </div>
            <div class="m-3">
                <label for="name" class="form-label"></label>
                <input type="text" class="form-control" value="<?= $user['gender'] ?>" name="gender" disabled required>
            </div>
            <div class="m-3">
                <label for="email" class="form-label"></label>
                <input type="email" class="form-control" value="<?= $user['email'] ?>" name="email" disabled required>
            </div>
            <div class="m-3">
                <label for="phone" class="form-label"></label>
                <input type="number" class="form-control" value="<?= $user['phone'] ?>" name="phone" disabled required>
            </div>

            <?php
            ?>


            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Launch demo modal
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>