<?php
include('../database/dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $question_ids = $_POST["question_ids"];  
    $successCount = 0;
    foreach ($question_ids as $question_id) {
        $sql = "DELETE FROM question WHERE id = $question_id";
        $result = mysqli_query($con, $sql);
        
        if ($result) {
            $successCount++;
        }
    }
    
    if ($successCount == count($question_ids)) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Failed to delete courses"));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request method"));
}
?>
