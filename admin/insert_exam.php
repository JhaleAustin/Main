<?php
include('../database/dbcon.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $exam_name = $_POST['exam_name'];
    $course = $_POST['course'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $sql = "INSERT INTO exams (exam_name, course, date, time) VALUES ('$exam_name', '$course', '$date', '$time')";
    if(mysqli_query($con, $sql)) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => mysqli_error($con)));
    }
}
?>
