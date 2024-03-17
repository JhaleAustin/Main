<?php
include('includes/headeradmin.php');
include('../middleware/adminmiddleware.php');
include('../database/dbcon.php');
 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $lecturer_id = $_POST['lecturer_id'];
    $question = $_POST['question'];
    $answer_key = $_POST['answer_key'];
    $question_weight = $_POST['question_weight'];
 
    $sql = "INSERT INTO question (lecturer_id, question, answer_key, question_weight) 
            VALUES ('$lecturer_id', '$question', '$answer_key', '$question_weight')";
    $result = mysqli_query($con, $sql);
 
    if ($result) { 
        $question_id = mysqli_insert_id($con);
 
        $abjad = ['a', 'b', 'c', 'd'];
        foreach ($abjad as $abj) {
            $answer = $_POST['answer_key_' . $abj];
 
            $sql = "INSERT INTO choices (question_id, choices_text,letter) 
                    VALUES ('$question_id', '$answer','$abj')";
            $result = mysqli_query($con, $sql);

          
            if (!$result) {
               
                echo "Error: " . mysqli_error($con);
                exit(); 
            }
        }
 
        header("Location: question.php");
        exit();  
    } else {
 
        echo "Error: " . mysqli_error($con);
    }
}
?>

<div class="row">
    <div class="col-sm-12">    
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Form</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="form-group">
                                <label for="lecturer_id">Lecturer (Course)</label>
                                <select name="lecturer_id" id="lecturer_id" class="form-control select2" style="width: 100%!important">
                                    <option value="" disabled selected>Choose Lecturer</option>
                                    <?php 
                                    $sql = "SELECT * FROM lecture";
                                    $result = mysqli_query($con, $sql);
                                    if ($result && mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $row['id'] .  '">' . $row['lecture_name'] . '</option>';
                                        }
                                        mysqli_free_result($result);
                                    } else {
                                        echo '<option value="">No lecturers available</option>';
                                    }
                                    ?>
                                </select>
                                <small class="help-block"></small>
                            </div>

                            <div class="col-sm-12">
                                <label for="question" class="control-label">Question</label>
                                <div class="form-group">
                                    <input type="file" name="file_question" class="form-control">
                                    <small class="help-block" style="color: #dc3545"> </small>
                                </div>
                                <div class="form-group">
                                    <textarea name="question" id="question" class="form-control summernote"> </textarea>
                                    <small class="help-block" style="color: #dc3545"> </small>
                                </div>
                            </div>

                            <?php
                            $abjad = ['a', 'b', 'c', 'd'];
                            foreach ($abjad as $abj) :
                                $ABJ = strtoupper($abj);
                            ?>

                            <div class="col-sm-12">
                                <label for="answer_key_<?= $abj; ?>" class="control-label">Answer <?= $ABJ; ?></label>
                                <div class="form-group">
                                    <input type="file" name="file_<?= $abj; ?>" class="form-control">
                                    <small class="help-block" style="color: #dc3545"> </small>
                                </div>
                                <div class="form-group">
                                    <textarea name="answer_key_<?= $abj; ?>" id="answer_key_<?= $abj; ?>" class="form-control summernote"> </textarea>
                                    <small class="help-block" style="color: #dc3545"> </small>
                                </div>
                            </div>

                            <?php endforeach; ?>

                            <div class="form-group col-sm-12">
                                <label for="answer_key" class="control-label">Answer key</label>
                                <select required="required" name="answer_key" id="answer_key" class="form-control select2" style="width:100%!important">
                                    <option value="" disabled selected>Choose Answer key</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>                
                                <small class="help-block" style="color: #dc3545"> </small>
                            </div>

                            <div class="form-group col-sm-12">
                                <label for="question_weight" class="control-label">Question Weight</label>
                                <input required="required" value="1" type="number" name="question_weight" placeholder="Question Weight" id="question_weight" class="form-control">
                                <small class="help-block" style="color: #dc3545"> </small>
                            </div>

                            <div class="form-group pull-right">
                                <a href=" " class="btn btn-flat btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
                                <button type="submit" id="submit" class="btn btn-flat bg-purple"><i class="fa fa-save"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>

<?php
include('includes/footer.php');
?>
