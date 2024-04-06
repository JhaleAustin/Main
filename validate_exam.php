<?php
include('database/dbcon.php');

// Check if referenceNumber is set and not empty
if(isset($_POST['referenceNumber']) && !empty($_POST['referenceNumber'])) {
    // Sanitize the input to prevent SQL injection
    $referenceNumber =  mysqli_real_escape_string($con, $_POST['referenceNumber']);

    // Prepare a SQL query to check if the reference number exists in the database
    $sql = "SELECT * FROM application_data WHERE reference_number = '$referenceNumber'";
    
    // Execute the query
    $result = mysqli_query($con, $sql);

    // Check if any rows were returned
    if(mysqli_num_rows($result) > 0) {
        // Reference number exists, redirect to exam page
        header("Location: exam.php");
        exit; // Make sure to exit after redirecting
    } else {
        // Reference number does not exist, display alert and go back to previous page
        echo "<script>alert('Invalid reference number!'); window.history.back();</script>";
    }
} else {
    // If referenceNumber is not set or empty, display alert and go back to previous page
    echo "<script>alert('Reference number is required!'); window.history.back();</script>";
}
?>
