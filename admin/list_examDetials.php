<?php include('includes/headeradmin.php'); ?>
<?php include('../middleware/adminmiddleware.php'); ?>
<?php include('../database/dbcon.php'); ?>

<?php
// Check if exam ID is provided in the URL
if(isset($_GET['id'])) {
    $exam_id = $_GET['id'];
    
    // Fetch exam data from the database
    $sql = "SELECT * FROM exams WHERE id = $exam_id";
    $result = mysqli_query($con, $sql);
    
    // Check if exam exists
    if(mysqli_num_rows($result) > 0) {
        $exam = mysqli_fetch_assoc($result);
    } else {
        // Redirect to some error page or display error message
        header("Location: error.php");
        exit();
    }
    
    // Fetch connected data for the exam
    $connected_data_sql = "SELECT * FROM connected_table WHERE exam_id = $exam_id";
    $connected_data_result = mysqli_query($con, $connected_data_sql);
    
} else {
    // Redirect to some error page or display error message if ID is not provided
    header("Location: error.php");
    exit();
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Exam Details - <?php echo $exam['exam_name']; ?></h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Column 1</th>
                        <th>Column 2</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($connected_data_result)) {
                        // Output connected data in table rows
                        echo "<tr>";
                        echo "<td>" . $row['column1'] . "</td>";
                        echo "<td>" . $row['column2'] . "</td>";
                        // Add more columns as needed
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
