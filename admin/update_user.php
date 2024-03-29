<?php
include('../database/dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST['id']; // Assuming you have an input field for user ID in the form
    $fname = $_POST['edit_fname'];
    $lname = $_POST['edit_lname'];
    $gender = $_POST['edit_gender'];
    $email = $_POST['edit_email'];
    $phone = $_POST['edit_phone'];
    
    // Update user data in the database
    $sql = "UPDATE user SET fname='$fname', lname='$lname', gender='$gender', email='$email', phone='$phone' WHERE id=$id";
    if (mysqli_query($con, $sql)) {
        echo "User data updated successfully.";
    } else {
        echo "Error updating user data: " . mysqli_error($con);
    }
} else {
    echo "Invalid request.";
}
?>
