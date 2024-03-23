<?php
include('../database/dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $lecture_ids = $_POST["lecture_ids"]; // Use course_ids instead of course_id
    
    $successCount = 0;
    foreach ($lecture_ids as $lecture_id) {
        $sql = "DELETE FROM lecture WHERE id = $lecture_id";
        $result = mysqli_query($con, $sql);
        
        if ($result) {
            $successCount++;
        }
    }
    
    if ($successCount == count($lecture_ids)) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Failed to delete courses"));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request method"));
}
?>
