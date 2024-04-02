<?php 
include('session.php');
include('include/header.php');

if(isset($_SESSION['auth']))
{
    $_SESSION['message'] = "You are already logged in";
    header('Location: index.php');
    exit();
}

include('./database/dbcon.php'); 

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Generate a unique reference number
$referenceNumber = uniqid(); // You can use other methods to generate a unique identifier

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $type = $_POST['type'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $referenceNumber = $_POST['reference_number'];
    
    // Sanitize data
    $type = mysqli_real_escape_string($conn, $type);
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $referenceNumber = mysqli_real_escape_string($conn, $referenceNumber);
    
    // Insert data into database
    $sql = "INSERT INTO your_table_name (type, name, email, reference_number) VALUES ('$type', '$name', '$email', '$referenceNumber')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Data saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

?>
<div class="container mt-5">
    <h1 class="text-center">Log in</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="row">
                <div class="col text-center">
                    <button type="button" class="btn btn-lg btn-primary btn-block" id="shsBtn">SHS</button>
                </div>
            </div>

            <div class="dropdown mt-3 text-center" id="shsDropdown" style="display: none;">
                <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="shsDropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    SHS Options
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="shsDropdownMenuButton">
                    <!-- Insert SHS dropdown options here -->
                    <a class="dropdown-item" href="#" data-type="shs">Option 1</a>
                    <a class="dropdown-item" href="#" data-type="shs">Option 2</a>
                    <a class="dropdown-item" href="#" data-type="shs">Option 3</a>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col text-center">
                    <button type="button" class="btn btn-lg btn-primary btn-block" id="collegeBtn">College</button>
                </div>
            </div>

            <div class="dropdown mt-3 text-center" id="collegeDropdown" style="display: none;">
                <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="collegeDropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    College Options
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="collegeDropdownMenuButton">
                    <!-- Insert College dropdown options here -->
                    <a class="dropdown-item" href="#" data-type="college">Option A</a>
                    <a class="dropdown-item" href="#" data-type="college">Option B</a>
                    <a class="dropdown-item" href="#" data-type="college">Option C</a>
                </div>
            </div>

            <form id="applicationForm" class="mt-3 text-center" style="display: none;">
                <!-- Your application form fields here -->
                <input type="text" name="name" placeholder="Name"><br>
                <input type="email" name="email" placeholder="Email"><br>
                <input type="hidden" name="reference_number" value="<?php echo $referenceNumber; ?>"> <!-- Hidden field for reference number -->
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>

            <div id="referenceForm" class="mt-3 text-center" style="display: none;">
                <p style="color: blue;">Your reference number: <strong><?php echo $referenceNumber; ?></strong></p>
                <p>This reference number will be sent to your email with instructions on how to pay for the entrance exam fee.</p>
                <button id="submitReference" class="btn btn-primary">Save Data</button>
            </div>

            <div class="row mt-3">
                <div class="col text-center">
                    <a href="registration.php" class="text-muted">Don't have an account? Register here</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery and Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function () {
        $('#shsBtn').click(function () {
            $('#shsDropdown').toggle();
            $('#collegeDropdown').hide();
        });

        $('#collegeBtn').click(function () {
            $('#collegeDropdown').toggle();
            $('#shsDropdown').hide();
        });

        $('#applicationForm').submit(function (e) {
            e.preventDefault();
            $('#applicationForm').hide();
            $('#referenceForm').show();
        });

        $('#submitReference').click(function () {
            // You can retrieve and save all the form data here
            // For demonstration purpose, you can alert the reference number
            alert('Reference Number: <?php echo $referenceNumber; ?>');
        });

        $('.dropdown-item').click(function () {
            var type = $(this).data('type');
            showForm(type);
        });

        function showForm(type) {
            if (type === 'shs') {
                $('#applicationForm').show();
                $('#collegeDropdown').removeClass('show');
            } else if (type === 'college') {
                $('#applicationForm').show();
                $('#shsDropdown').removeClass('show');
            }
        }
    });
</script>

<?php include('include/footer.php'); ?>
