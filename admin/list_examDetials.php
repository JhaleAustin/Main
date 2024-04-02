<?php include('includes/headeradmin.php'); ?>
<?php include('../middleware/adminmiddleware.php'); ?>
<?php include('../database/dbcon.php'); ?>


<?php
// Check if exam_id is provided in the URL
if (isset($_GET['id'])) {
    $exam_id = mysqli_real_escape_string($con, $_GET['id']);
}
?>

<!-- 
<div id="addExamFormContainer" style="display: none;">
 
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h3>User Profile</h3>
                </div>
                <div class="card-body">
                   <form id="addExamForm">
        <div class="form-group">
            <label for="exam_name">Exam Name</label>
            <input type="text" class="form-control" id="exam_name" name="exam_name" required>
        </div>
        <div class="form-group">
            <label for="course">Course</label>
            <input type="text" class="form-control" id="course" name="course" required>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="time">Time</label>
            <input type="time" class="form-control" id="time" name="time" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Exam</button>
        <button type="button" class="btn btn-default" onclick="closeAddExamForm()">Close</button>
    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div> -->

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">EXAM DETAILS</h3>
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
                    <th>No. of Question</th>
                    <th>Start of Exam</th>
                    <th>End of Exam</th>
                    <th>Time</th>
                    
                    <th>Exam Pass Code</th>
                    
                    <th>Course Strand</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql = "SELECT * FROM exams";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) { 
                ?>
                    <!-- <tr>
                        <td><input type="checkbox" class="checkbox-item" data-id="<?php echo $row['id']; ?>"></td>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['exam_name']; ?></td>
                        <td><?php echo $row['course']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                        <td><a href="list_examDetials.php?id=<?php echo $row['id']; ?>">See More</a></td>
                   
                    </tr> -->
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
