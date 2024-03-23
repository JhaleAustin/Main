<?php
include('../database/dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $course_ids = $_POST["course_ids"]; // Use course_ids instead of course_id
    
    $successCount = 0;
    foreach ($course_ids as $course_id) {
        $sql = "DELETE FROM course WHERE id = $course_id";
        $result = mysqli_query($con, $sql);
        
        if ($result) {
            $successCount++;
        }
    }
    
    if ($successCount == count($course_ids)) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Failed to delete courses"));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request method"));
}
?>
