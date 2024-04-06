<?php
include('session.php');
include('include/header.php');
?>
<style>
  .carousel-inner .carousel-item img {
    height: 550px;
    object-fit: cover;
  }

  div.gallery {
    margin: 100px;
    border: 1px solid #ccc;
    float: right;
    width: 180px;
    left: 100;
  }

  div.gallery:hover {
    border: 1px solid #777;
  }

  div.gallery img {
    width: 100%;
    height: auto;
  }

  div.desc {
    padding: 20px;
    text-align: center;
  }

  .icons {
    display: flex;
    justify-content: center;
  }

  .flex1 {
    min-height: 100px;
  }

  .flex2 {
    min-height: 100px;
  }

  .flex3 {
    min-height: 100px;
  }

  .flex4 {
    min-height: 100px;
  }

  #easier {
    height: 300px;
    background-color: #FFFFFF;
    font: italic 15px monospace;
  }
</style>


<div id="examModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Enter Reference Number</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form id="examForm" method="post" action="validate_exam.php"> <!-- Modified form action -->
          <div class="form-group">
            <label for="referenceNumber">Reference Number:</label>
            <input type="text" class="form-control" id="referenceNumber" name="referenceNumber">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button> <!-- Submit button added -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="slideshow" style="background-color:#F5FEFD;padding-top: 10px; padding-bottom: 5px;background-color:#FEFCF8">
  <div class="container text-center " style="margin-top:10 px; padding-left: 10px; padding-right: 10px; background-color:#FFEF00;">
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

      <!-- Indicators/dots -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
      </div>

      <!-- The slideshow/carousel -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="image/purps.jpg" alt="#" class="d-block" style="width:100%">
        </div>
        <div class="carousel-item">
          <img src="image/test1.jpg" alt="#" class="d-block" style="width:100%">
        </div>
        <div class="carousel-item">
          <img src="image/pic1.jpg" alt="#" class="d-block" style="width:100%">
        </div>
        <div class="carousel-item">
          <img src="image/entranceexam.jpg" alt="#" class="d-block" style="width:100%">
        </div>
      </div>

      <!-- Left and right controls/icons -->
      <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>
</div>

<!-- Button to trigger modal -->
<div class="text-center">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#examModal">Take Exam</button>
</div>

<!-- icons sa baba ng slide show -->
<div class="icons" style="text-align: center;font-size: 20px;font-family: 'Montserrat', sans-serif;">
  <div class="gallery flexbox-1">
    <a target="_blank" href="img_5terre.jpg">
      <img src="image/motiv.png" alt="Cinque Terre" width="600" height="400" style="border-radius: 50%;">
    </a>
    <div class="desc">Motivation</div>
  </div>
  <div class="gallery flexbox-2">
    <a target="_blank" href="img_forest.jpg">
      <img src="image/discip.png" alt="Forest" width="600" height="400" style="border-radius: 50%;">
    </a>
    <div class="desc">Discipline

    </div>
  </div>

  <div class="gallery flexbox-3">
    <a target="_blank" href="img_lights.jpg">
      <img src="image/enca.png" alt="Northern Lights" width="600" height="400" style="border-radius: 70%;">
    </a>
    <div class="desc">Encouragement</div>
  </div>

  <div class="gallery flexbox-4">
    <a target="_blank" href="img_mountains.jpg">
      <img src="image/diligence.png" alt="Mountains" width="600" height="400" style="border-radius: 50%;">
    </a>
    <div class="desc">Diligence</div>
  </div>
</div>

<div class="paymenteasy" style="background-color:#f5f5dc; text-align: center; color: #002D62;font-family: 'Montserrat', sans-serif;">
  <div class="easier" style="padding-top: 35px;padding-bottom: 35px">
    <h2>Entrance Exam Payments made easier with Just paying at the Cashier for fast transaction and fast verification</h2>
  </div>
  <hr style="height:2px;border-width:0;color:gray;background-color:gray">
  <div class="isntuction">
    <h4>Log in to your Account or if you dont have an account yet you can register!</h4>
    <h4>Just go to the Log in button and click the link there to register!</h4>
  </div>
</div>
<!-- Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  function submitExam() {
    // Retrieve the reference number entered by the user
    var referenceNumber = document.getElementById('referenceNumber').value;
    
    // Perform AJAX request to validate the reference number
    $.ajax({
      url: 'validate_exam.php',
      type: 'POST',
      data: { referenceNumber: referenceNumber },
      success: function(response) {
        // Handle the response from the server
        if(response.trim() === "Reference number is valid!") {
          // If validation is successful, redirect to the exam page
          window.location.href = "exam.php";
        } else {
          // If validation fails, display the response message
          alert(response);
        }
      },
      error: function(xhr, status, error) {
        // Handle AJAX error
        console.error(xhr.responseText);
        alert('Error: ' + xhr.status);
      }
    });
  }
</script>

<?php include('include/footer.php'); ?>
