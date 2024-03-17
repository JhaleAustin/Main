<?php
include('includes/headeradmin.php');
include('../middleware/adminmiddleware.php'); 


include('../database/dbcon.php');  
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
 
    $course_name = $_POST["course_name"];
    
      $sql = "INSERT INTO course (course_name) 
      VALUES ('$course_name')";
     $result = mysqli_query($con, $sql);
     if ($result) {
        redirect("../admin/course.php","Successfully Save" );
      
     }
  
 

    }
?>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Form</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-offset-4 col-sm-4">
                <form action="course.php" method="post" class="my-2">
                    <div class="form-group">
                        <a href=" " class="btn btn-default btn-xs">
                            <i class="fa fa-arrow-left"></i> Cancel
                        </a>
                        <div class="pull-right">
                            <span>Amount: </span><label for=""></label>
                        </div>
                    </div>
                    <table id="form-table" class="table text-center table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Course</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> </td>
                                <td>
                                    <div class="form-group">
                                        <input autofocus="autofocus"  autocomplete="off" type="text" name="course_name" class="form-control">
                                        <small class="help-block text-right"></small>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button id="submit" type="submit" class="mb-4 btn btn-block btn-flat bg-purple">
                        <i class="fa fa-save"></i> Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
?>
