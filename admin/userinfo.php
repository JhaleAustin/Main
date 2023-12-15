<?php
include('includes/headeradmin.php');
include('../middleware/adminmiddleware.php');



?>

<div class="conteiner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>User info</h4>
                </div>
                <div class="card-body">
                    <div class="column">
                        <div class="col-md-6">
                            <label for="">First Name</label>
                            <input type="text" name="fname" place class="form-control">
                        </div>
                        <div class="col md-6">
                            <label for="">Middle Name</label>
                            <input type="text" name="mdname"class="form-control">
                        </div>
                        <div class="col md-6">
                            <label for="">Last Name</label>
                            <input type="text" name="lname"class="form-control">
                        </div>
                        <div class="col md-6">
                            <label for="">Phone number</label>
                            <input type="text" name="phone"class="form-control">
                        </div>
                        <div class="col md-6">
                            <label for="">Email</label>
                            <input type="text" name="email"class="form-control">
                        </div>
                        <div class="col md-6">
                            <label for="">Upload Image</label>
                            <input type="File" name="image"class="form-control">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>


<?php
include('includes/footer.php');
?>