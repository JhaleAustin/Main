<?php include('includes/headeradmin.php'); ?>
<?php include('../middleware/adminmiddleware.php'); ?>
<?php include('../database/dbcon.php'); ?><?php
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
                    <h3>Proof of Payment</h3>
                </div>
                <div class="card-body">
                    <!-- Display the proof of payment image -->
                    <img src="<?php echo $user['proof_of_payment']; ?>" class="img-fluid" alt="Proof of Payment">
                    <div class="mt-3">
                        <!-- Buttons for validation and decline -->
                        <button class="btn btn-success" onclick="validatePayment(<?php echo $user_id; ?>)">Validate</button>
                        <button class="btn btn-danger" onclick="declinePayment(<?php echo $user_id; ?>)">Decline</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
