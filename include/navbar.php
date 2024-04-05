<div class= "navigationbar">
    <div class="div" style="background-color:#FFEF00;font-family: 'Montserrat', sans-serif;">
        <img src="image/SPS_Logo.png" style="width:175px; height:115px;" class="img-fluid rounded mx-auto d-block" alt="...">
        <p class="m-0 navbar-brand text-black text-center fs-3" href="index.php">Student Personnel Services UPHSL</p>
    </div>  
    <nav class="navbar navbar-expand-lg text-center" style="background-color:#002366;font-family: 'Montserrat', sans-serif;">
        <div class="container-fluid justify-content-center">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-0" id="navbarScroll">
                <ul class="navbar-nav my-2 my-lg-0 navbar-nav-scroll text-center fs-5" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Apply & Upload
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="applyforexam.php">Apply for entrance EXAM</a></li>
        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#uploadModal">Upload Documents</a></li>
    </ul>
</li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="about.php">About</a>
                    </li>
                    <?php
                    if(isset($_SESSION['auth'])) {
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $login_session;?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="#">My Reference Number</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                        <?php
                    } else {
                        ?>
                        <a href="login.php" class="btn btn-primary text-black text-decoration-none btn-block float-end fs-5">Log-in</a>;
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<!-- Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadModalLabel">Upload Proof of Payment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="uploadForm" method="post" action="upload_process.php" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="referenceNumber" class="form-label">Reference Number:</label>
            <input type="text" class="form-control" id="referenceNumber" name="reference_number">
          </div>
          <div class="mb-3">
            <label for="proofOfPayment" class="form-label">Proof of Payment:</label>
            <input type="file" class="form-control" id="proofOfPayment" name="proof_of_payment">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  // Function to handle dropdown toggle
   
  $(document).ready(function(){
    // Function to handle form submission
    $('#uploadForm').submit(function(event){
      event.preventDefault(); // Prevent default form submission
      
      // Serialize form data
      var formData = $(this).serialize();
      
      // Submit form data using AJAX
      $.ajax({
        type: 'POST',
        url: 'upload_process.php',
        data: formData,
        success: function(response){
          // Display success or error message
          alert(response); // Show alert with response message
          location.reload(); // Reload the page
        },
        error: function(xhr, status, error){
          // Display error message if AJAX request fails
          alert('An error occurred: ' + error); // Show alert with error message
        }
      });
    });
    
    // Function to focus on reference number input field when modal is shown
    $('#uploadModal').on('shown.bs.modal', function () {
      $('#referenceNumber').focus();
    });
  });
</script>



  
</script>
