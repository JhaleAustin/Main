<?php
include('includes/headeradmin.php');
include('../middleware/adminmiddleware.php');
include('../database/dbcon.php'); 
 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $nip = $_POST['nip'];
    $lecture_name = $_POST['lecture_name'];
    $email = $_POST['email'];
    $course_id = $_POST['course_id'];
    
  
          $sql = "INSERT INTO lecture (NIP , lecture_name , lecture_email , course_id) 
          VALUES ('$nip','$lecture_name','$email','$course_id')";
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
            <a href=" " class="btn btn-sm btn-flat btn-warning">
                <i class="fa fa-arrow-left"></i> Cancel
            </a>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">

            <form action="lecture.php" method="post"  >
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input autofocus="autofocus" onfocus="this.select()" type="number" id="nip" class="form-control" name="nip" placeholder="NIP">
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group">
                        <label for="lecture_name">Lecturer Name</label>
                        <input type="text" class="form-control" name="lecture_name" placeholder="Lecturer Name">
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group">
                        <label for="email">Lecturer Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Lecturer Email">
                        <small class="help-block"></small>
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

                    <div class="form-group pull-right">
                        <button type="reset" class="btn btn-flat btn-default">
                            <i class="fa fa-rotate-left"></i> Reset
                        </button>
                        <button type="submit" id="submit" class="btn btn-flat bg-purple">
                            <i class="fa fa-save"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 

<?php
include('includes/footer.php');
?>
