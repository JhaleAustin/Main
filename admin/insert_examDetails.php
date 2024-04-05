<?php
include('../database/dbcon.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $exam_id =  $_POST['id'] ;
    $exam_name = $_POST['exam_name'] ;
    $numQ =   $_POST['numQ'] ;
    $start_date = $_POST['start_date'] ;
    $end_date =  $_POST['end_date'] ;
    $time =  $_POST['time'] ;
    $exam_code =   $_POST['exam_code'] ;
    $course_id =   $_POST['course_id'] ;

    // Concatenate start date and time
    $start_datetime = $start_date . ' ' . $time;

    // Concatenate end date and time
    $end_datetime = $end_date . ' ' . $time;

    // Insert query
    $sql = "INSERT INTO exam_details (exam_id, exam_name, numberQ, startExam, EndExam, time, examPass, CourseStrand) 
            VALUES ('$exam_id', '$exam_name', '$numQ', '$start_datetime', '$end_datetime', '$time', '$exam_code', '$course_id')";

    if (mysqli_query($con, $sql)) {
        $response = array(
            'status' => 'success',
            'message' => 'Exam details added successfully'
        );
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Error: ' . mysqli_error($con)
        );
    }

    // Close connection
    mysqli_close($con);

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // If not a POST request, redirect back to the form page
    header('Location: index.php');
}
?>
