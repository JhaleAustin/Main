<?php
include('includes/headeradmin.php');
include('../middleware/adminmiddleware.php');
include('../database/dbcon.php'); 
 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $lecture_name = $_POST['lecture_name'];
    $email = $_POST['email'];
    $course_id = $_POST['course_id'];
    $numQ = $_POST['numQ'];
    $exam_code = $_POST['exam_code'];
    
  
          $sql = "INSERT INTO lecture (NIP , lecture_name , lecture_email , course_id,ExamCode,noQuestion) 
          VALUES ('$nip','$lecture_name','$email','$course_id', ' $numQ ','$exam_code')";
         $result = mysqli_query($con, $sql);
         if ($result) {
            redirect("../admin/course.php","Successfully Save" );
          
         }
      
     
    
        }
    ?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
        <div class="box-tools pull-right">
            <a href="" class="btn btn-sm btn-flat btn-warning">
                <i class="fa fa-arrow-left"></i> Cancel
            </a>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="alert bg-purple">
                    <h4>Course <i class="fa fa-book pull-right"></i></h4>
                    <p><?=$matkul->nama_matkul?></p>
                </div>
                <div class="alert bg-purple">
                    <h4>Lecturer <i class="fa fa-address-book-o pull-right"></i></h4>
                    <p><?=$dosen->nama_dosen?></p>
                </div>
            </div>
            <div class="col-sm-4">
                 <div class="form-group">
                    <label for="nama_ujian">Exam Name</label>
                    <input autofocus="autofocus" onfocus="this.select()" placeholder="Exam Name" type="text" class="form-control" name="nama_ujian">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="jumlah_soal">Number of Questions</label>
                    <input placeholder="Number of Questions" type="number" class="form-control" name="jumlah_soal">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="tgl_mulai">Start Date</label>
                    <input name="tgl_mulai" type="text" class="datetimepicker form-control" placeholder="Start Date">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="tgl_selesai">Date of completion</label>
                    <input name="tgl_selesai" type="text" class="datetimepicker form-control" placeholder="Date of completion">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="waktu">Time</label>
                    <input placeholder="In Minute" type="number" class="form-control" name="waktu">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="jenis">Question Pattern</label>
                    <select name="jenis" class="form-control">
                        <option value="" disabled selected>--- Choose ---</option>
                        <option value="Random">Random Question</option>
                        <option value="Sort">Sort questions</option>
                    </select>
                    <small class="help-block"></small>
                </div>
                <div class="form-group pull-right">
                    <button type="reset" class="btn btn-default btn-flat">
                        <i class="fa fa-rotate-left"></i> Reset
                    </button>
                    <button id="submit" type="submit" class="btn btn-flat bg-purple"><i class="fa fa-save"></i> Save</button>
                </div>
             </div>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
?>
