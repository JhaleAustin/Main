<?php
include('./database/dbcon.php');

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $type = $_POST['type'];
    $option = $_POST['selectedOption'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $referenceNumber = $_POST['reference_number'];
    
    // Sanitize data
    $type = mysqli_real_escape_string($con, $type);
    $option = mysqli_real_escape_string($con, $option);
    $name = mysqli_real_escape_string($con, $name);
    $email = mysqli_real_escape_string($con, $email);
    $address = mysqli_real_escape_string($con, $address);
    $phone = mysqli_real_escape_string($con, $phone);
    $referenceNumber = mysqli_real_escape_string($con, $referenceNumber);
    
    // Insert data into database
    $sql = "INSERT INTO application_data (type, option_selected, name, email, address, phone, reference_number) 
            VALUES ('$type', '$option', '$name', '$email', '$address', '$phone', '$referenceNumber')";
    
    if ($con->query($sql) === TRUE) {
        echo "Data saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>
