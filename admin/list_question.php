<?php include('includes/headeradmin.php'); ?>
<?php include('../middleware/adminmiddleware.php'); ?>
<?php include('../database/dbcon.php'); ?>

<!-- Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="updateModalLabel">Update Course</h4>
            </div>
            <div class="modal-body">
                <form id="updateForm">
                    <div class="form-group">
                        <label for="update_course_name">Course Name</label>
                        <input type="text" class="form-control" id="update_course_name" name="update_course_name">
                        <input type="hidden" id="update_course_id" name="update_course_id">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">QUESTION</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="mt-2 mb-3">
            <a href="question.php" class="btn btn-sm btn-flat bg-blue"><i class="fa fa-plus"></i> Add Data</a>
            <a href="#" class="btn btn-sm btn-flat btn-success"><i class="fa fa-upload"></i> Import</a>
            <button type="button" onclick="reload_ajax()" class="btn btn-sm bg-maroon btn-flat btn-default"><i class="fa fa-refresh"></i> Reload</button>
            <div class="pull-right">
                <button onclick="bulk_edit()" class="btn btn-sm btn-flat btn-warning" type="button"><i class="fa fa-edit"></i> Edit</button>
                <button onclick="bulk_delete()" class="btn btn-sm btn-flat btn-danger" type="button"><i class="fa fa-trash"></i> Delete</button>
            </div>
        </div>
        <table id="matkul" class="w-100 table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th><input type="checkbox" id="select-all-checkbox"></th>
                    <th>#</th>
                    <th>Question</th>
                         
                    <th>Question Weight Name</th>
                
                    <th>Answer Key</th></tr>
            </thead>
            <tbody>
                <?php 
                $sql = "SELECT * FROM question";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) { 
                ?>
                    <tr>
                        <td><input type="checkbox" class="checkbox-item" data-id="<?php echo $row['id']; ?>"></td>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['question']; ?></td>
                        <td><?php echo $row['question_weight']; ?></td>
                        <td><?php echo $row['answer_key']; ?></td>
                      
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<?php include('includes/footer.php'); ?>

<script src="https://ajax.google/apis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
// Function to handle bulk delete
function bulk_delete() {
    var selectedIds = [];
    $('.checkbox-item:checked').each(function(){
        selectedIds.push($(this).data('id'));
    });

    if(selectedIds.length === 0) {
        alert('Please select at least one course to delete.');
        return;
    }

    if (confirm('Are you sure you want to delete selected courses?')) {
        $.ajax({
            type: 'POST',
            url: 'delete_question.php',
            data: {question_ids: selectedIds}, // Change courseId to selectedIds
            dataType: 'json',
            success: function(response){
                if(response.status == 'success'){
                    alert('Courses deleted successfully');
                    location.reload();
                } else {
                    alert('Failed to delete courses: ' + response.message);
                }
            },
            error: function(xhr, status, error){
                alert('Failed to delete courses: ' + error);
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
</script>
