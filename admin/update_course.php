<?php
include('../database/dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $course_id = $_POST["course_id"];
    $course_name = $_POST["course_name"];
    
    $sql = "UPDATE course SET course_name = '$course_name' WHERE id = $course_id";
    $result = mysqli_query($con, $sql);
    
    if ($result) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "error", "message" => mysqli_error($con)));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request method"));
}
?>
