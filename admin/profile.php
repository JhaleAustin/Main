<?php include('../database/dbcon.php'); ?>
<?php include('includes/headeradmin.php'); ?>
<?php include('../middleware/adminmiddleware.php'); ?>

<?php
// Check if user ID is provided in the URL
if(isset($_GET['id'])) {
    $user_id = $_GET['id'];
    
    // Fetch user data from the database
    $sql = "SELECT * FROM user WHERE id = $user_id";
    $result = mysqli_query($con, $sql);
    
    // Check if user exists
    if(mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        // Redirect to some error page or display error message
        header("Location: error.php");
        exit();
    }
} else {
    // Redirect to some error page or display error message if ID is not provided
    header("Location: error.php");
    exit();
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h3>User Profile</h3>
                </div>
                <div class="card-body">
                    <form id="editForm">
                        <div class="form-group">
                            <label for="fname">First Name:</label>
                            <input type="text" class="form-control" id="fname" value="<?php echo $user['fname']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name:</label>
                            <input type="text" class="form-control" id="lname" value="<?php echo $user['lname']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <input type="text" class="form-control" id="gender" value="<?php echo $user['gender']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" id="email" value="<?php echo $user['email']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" class="form-control" id="phone" value="<?php echo $user['phone']; ?>" readonly>
                        </div>
                        <button type="button" class="btn btn-primary" id="editBtn">Edit</button>
                        <button type="submit" class="btn btn-success d-none" id="saveBtn">Save Changes</button>
                    </form>

                    <!-- Add this button to the user profile page -->
<button class="btn btn-primary" onclick="viewProofOfPayment(<?php echo $user_id; ?>)">View Proof of Payment</button>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); // Include footer file ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    console.log("Document ready!");

    $("#editBtn").click(function(){
        console.log("Edit button clicked!");
        // Enable editing by removing readonly attribute
        $("input").removeAttr("readonly");
        // Show save button
        $("#saveBtn").removeClass("d-none");
    });

    $("#editForm").submit(function(e){
        console.log("Form submitted!");
        e.preventDefault();
        // Get form data including user ID
        var formData = {
            id: "<?php echo $user['id']; ?>",
            edit_fname: $("#fname").val(),
            edit_lname: $("#lname").val(),
            edit_gender: $("#gender").val(),
            edit_email: $("#email").val(),
            edit_phone: $("#phone").val()
        };
        console.log(formData);
        // Send form data to update script
        $.ajax({
            type: 'POST',
            url: 'update_user.php',
            data: formData,
            success: function(response){
                // Handle response
                console.log(response);
                // Reload the page to display updated data
                window.location.reload();
            },
            error: function(xhr, status, error){
                // Handle error
                console.error(xhr.responseText);
            }
        });
    });
});

function viewProofOfPayment(userId) {
    // Redirect to the proof of payment page with user ID as parameter
    window.location.href = 'view_proof.php?id=' + userId;
}
</script>

