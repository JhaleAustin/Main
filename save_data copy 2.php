<?php 
include('session.php');
include('include/header.php');
require 'vendor/autoload.php'; // Include PHPMailer autoloader

if(isset($_SESSION['auth']))
{
    $_SESSION['message'] = "You are already logged in";
    header('Location: index.php');
    exit();
}

include('./database/dbcon.php'); 

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Generate a unique reference number
$referenceNumber = uniqid(); // You can use other methods to generate a unique identifier

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $type = $_POST['type'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $referenceNumber = $_POST['reference_number'];
    
    // Sanitize data
    $type = mysqli_real_escape_string($con, $type);
    $name = mysqli_real_escape_string($con, $name);
    $email = mysqli_real_escape_string($con, $email);
    $referenceNumber = mysqli_real_escape_string($conn, $referenceNumber);
    
    // Insert data into database
    $sql = "INSERT INTO application_data (type, name, email, reference_number) VALUES ('$type', '$name', '$email', '$referenceNumber')";
    
    if ($conn->query($sql) === TRUE) {
        // Send email with reference code
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email@gmail.com'; // Your Gmail email address
        $mail->Password = 'your_password'; // Your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('your_email@gmail.com', 'Your Name');
        $mail->addAddress($email, $name);

        $mail->isHTML(true);
        $mail->Subject = 'Your Reference Code';
        $mail->Body    = 'Your reference code: ' . $referenceNumber;

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

?>
