<?php include('includes/headeradmin.php'); ?>
<?php include('../middleware/adminmiddleware.php'); ?>
<?php include('../database/dbcon.php'); ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $exam_name = $_POST['exam_name'];
    $course = $_POST['course_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
  $numQ = $_POST['numQ'];
    $exam_code = $_POST['exam_code'];
    
  
    $sql = "INSERT INTO exams (exam_name, course, date, time,ExamCode,noQuestion) VALUES ('$exam_name', '$course', '$date', '$time',' $numQ ','$exam_code')";
    if(mysqli_query($con, $sql)) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => mysqli_error($con)));
    }
}
     
    
    
    ?>


<div id="addExamFormContainer" style="display: none;">
 
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h3>User Profile</h3>
                </div>
                <div class="card-body">
                   <form  action="list_exam.php" method="post">
        <div class="form-group">
            <label for="exam_name">Exam Name</label>
            <input type="text" class="form-control" id="exam_name" name="exam_name" required>
        </div>

        <div class="form-group">
                                <label for="numQ">No. of Question</label>
                                <input type="text" class="form-control" id="numQ" name="numQ" required>
                            </div>
                            <div class="form-group">
                        <label for="course_id">Course</label>
                        <select name="course_id" id="course_id" class="form-control select2" style="width: 100%!important">
                            <option value="" disabled selected>Choose Course</option>
                            <?php 
                            $sql = "SELECT * FROM course";
                            $result = mysqli_query($con, $sql);  
                            if ($result && mysqli_num_rows($result) > 0) {
                                  while ($row = mysqli_fetch_assoc($result)) {
                                     echo '<option value="' . $row['id'] . '">' . $row['course_name'] . '</option>';
                                }
                                  mysqli_free_result($result);
                            } else {
                                 echo '<option value="">No courses available</option>';
                            }
                            ?>
                        </select>
                        <small class="help-block"></small>
                    </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="time">Time</label>
            <input type="time" class="form-control" id="time" name="time" required>
        </div>

        <div class="form-group">
                                <label for="exam_code">Exam Code</label>
                                <input type="text" class="form-control" id="exam_code" name="exam_code" required>
                            </div>
        <button type="submit" class="btn btn-primary">Add Exam</button>
        <button type="button" class="btn btn-default" onclick="closeAddExamForm()">Close</button>
    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">EXAM LIST</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="mt-2 mb-3">
            <button type="button" class="btn btn-sm btn-flat bg-blue" onclick="toggleAddExamForm()"><i class="fa fa-plus"></i> Add Exam</button>
            <a href="#" class="btn btn-sm btn-flat btn-success"><i class="fa fa-upload"></i> Import</a>
            <button type="button" onclick="reload_ajax()" class="btn btn-sm bg-maroon btn-flat btn-default"><i class="fa fa-refresh"></i> Reload</button>
            <div class="pull-right">
                <button onclick="bulk_edit()" class="btn btn-sm btn-flat btn-warning" type="button"><i class="fa fa-edit"></i> Edit</button>
                <button onclick="bulk_delete()" class="btn btn-sm btn-flat btn-danger" type="button"><i class="fa fa-trash"></i> Delete</button>
            </div>
        </div>
        <table id="exams" class="w-100 table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th><input type="checkbox" id="select-all-checkbox"></th>
                    <th>#</th>
                    <th>Exam Name</th>
                    <th>Course</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Exam Details</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql = "SELECT * FROM exams";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) { 
                ?>
                    <tr>
                        <td><input type="checkbox" class="checkbox-item" data-id="<?php echo $row['id']; ?>"></td>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['exam_name']; ?></td>
                        <td>
    <?php
    $course_id = $row['course']; // Assuming 'course' field in $row contains the course ID
    $course_query = "SELECT course_name FROM course WHERE id = $course_id";
    $course_result = mysqli_query($con, $course_query);
    if ($course_result && mysqli_num_rows($course_result) > 0) {
        $course_row = mysqli_fetch_assoc($course_result);
        echo $course_row['course_name'];
    } else {
        echo "Course not found"; // Display a message if the course is not found or if there's an error
    }
    ?>
</td>
      <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                        <td><a href="list_examDetials.php?id=<?php echo $row['id']; ?>">See More</a></td>
                   
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('includes/footer.php'); ?>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
function toggleAddExamForm() {
    $('#addExamFormContainer').toggle();
}

function closeAddExamForm() {
    $('#addExamFormContainer').hide();
}

// Function to handle bulk delete
function bulk_delete() {
    var selectedIds = [];
    $('.checkbox-item:checked').each(function(){
        selectedIds.push($(this).data('id'));
    });

    if(selectedIds.length === 0) {
        alert('Please select at least one exam to delete.');
        return;
    }

    if (confirm('Are you sure you want to delete selected exams?')) {
        $.ajax({
            type: 'POST',
            url: 'delete_exam.php',
            data: {exam_ids: selectedIds},
            dataType: 'json',
            success: function(response){
                if(response.status == 'success'){
                    alert('Exams deleted successfully');
                    location.reload();
                } else {
                    alert('Failed to delete exams: ' + response.message);
                }
            },
            error: function(xhr, status, error){
                alert('Failed to delete exams: ' + error);
            }
        });
    }
}

$(document).ready(function() {
    // Function to handle select all checkbox
    $('#select-all-checkbox').change(function(){
        $('.checkbox-item').prop('checked', $(this).prop('checked'));
    });
}); 

$(document).ready(function() {
    // Handle form submission
    $('#addExamForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'insert_exam.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if(response.status == 'success') {
                    alert('Exam added successfully');
                    $('#addExamFormContainer').hide(); // Hide the form after submission
                    location.reload(); // Reload the page to update the exam list
                } else {
                    alert('Failed to add exam: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                alert('Failed to add exam: ' + error);
            }
        });
    });
}); 
</script>
