<?php
include('./database/dbcon.php');

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $referenceNumber = $_POST['reference_number'];
    
    // Sanitize data
    $referenceNumber = mysqli_real_escape_string($con, $referenceNumber);
    
    // Check if reference number exists in the database
    $sql = "SELECT * FROM application_data WHERE reference_number = '$referenceNumber'";
    $result = $con->query($sql);
    
    if ($result->num_rows > 0) {
        // Reference number exists, generate password and save data
        $password = generatePassword(); // Function to generate password
        
        // Save data into database
        $sql = "UPDATE application_data SET password = '$password' WHERE reference_number = '$referenceNumber'";
        if ($con->query($sql) === TRUE) {
            // Data saved successfully
            echo "Upload successful! Password generated: $password";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    } else {
        // Reference number does not exist
        echo "Reference number not found in the database.";
    }
}

// Function to generate password
function generatePassword() {
    // Generate a random password
    return substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 8);
}
?>
