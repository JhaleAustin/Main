
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
                    <a class="dropdown-item" href="#" data-type="shs">Academic:Accountancy,Business and Management (ABM)</a>
                    <a class="dropdown-item" href="#" data-type="shs">DAcademic:General Academic strand(GAS)</a>
                    <a class="dropdown-item" href="#" data-type="shs">Academic:Science,Technology, 
Engineering,and Mathematic(STEM)</a>
<a class="dropdown-item" href="#" data-type="shs">Academic:Humanities and Social Sciences (HUMSS)</a>
<a class="dropdown-item" href="#" data-type="shs">Technical-Vocational-Livelihood:Home Economics(TVL-HE)
</a>

<a class="dropdown-item" href="#" data-type="shs">Technical-Vocational-Livelihood:Information and Communication Technology
(TVL-ICT)</a>

<a class="dropdown-item" href="#" data-type="shs">Sports</a>
<a class="dropdown-item" href="#" data-type="shs">Arts and Design</a>
<a class="dropdown-item" href="#" data-type="shs">
Pre-baccalaureate Maritime</a>
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
                
<a class="dropdown-item" href="#" data-type="college">Bachelor of Arts in Communication</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Arts in Political Science
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Arts in Psychology
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Science in Psychology
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Early Childhood Education
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Elementary Education
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Special Need Education
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Secondary Education
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Library and Information Science
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Physical Education
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Science in Accountancy
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Science in Business Administration Major in Business Management
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Science in Management Accounting
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Science in Business Administration Major in Marketing Management
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Science in Business Administration major in Human Resource Management
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Science in Business Administration major in Financial Management
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Science in Aircraft Maintenance Technology
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Science in Architecture
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Science in Civil Engineering
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Science in Computer Engineering
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Science in Electrical Engineering
</a>
<a class="dropdown-item" href="#" data-type="college">
Bachelor of Science in Electronics Engineering
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Science in Industrial Engineering
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Science Mechanical Engineering
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Science in Computer Science
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Science in Information Technology
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Science in Criminology
</a>
<a class="dropdown-item" href="#" data-type="college">Bachelor of Science in Hospitality Management
</a>
<a class="dropdown-item" href="#" data-type="college">Associate in Hotel and Restaurant Management
</a> 
 </div>
            </div>

            <form id="applicationForm" class="mt-3 text-center" style="display: none;">
                <!-- Your application form fields here -->
                <input type="text" name="name" placeholder="Name"><br>
                <input type="email" name="email" placeholder="Email"><br>
                <input type="address" name="address" placeholder="address"><br>
                <input type="phone" name="phone" placeholder="phone"><br>
                <input type="hidden" name="reference_number" value="<?php echo $referenceNumber; ?>"> <!-- Hidden field for reference number -->
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="hidden" name="type">
<input type="hidden" name="selectedOption">
  </form>

            <div id="referenceForm" class="mt-3 text-center" style="display: none;">
                <p style="color: blue;">Your reference number: <strong><?php echo $referenceNumber; ?></strong></p>
                <p>This reference number will be sent to your email with instructions on how to pay for the entrance exam fee.</p>
                <button id="submitReference" class="btn btn-primary">Save Data</button>
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

    $('.dropdown-item').click(function () {
        var selectedOption = $(this).text(); // Kunin ang teksto ng piniling item sa dropdown
        $('[name="selectedOption"]').val(selectedOption); // Itakda ang piniling opsyon sa isang nakatagong patlang
        $('#selectedOptionDisplay').text(selectedOption); // Opsyonal: Ipakita ang piniling opsyon para sa sanggunian ng gumagamit
        var type = $(this).data('type'); // Kunin ang uri (SHS o kolehiyo)
        $('[name="type"]').val(type); // Itakda ang uri sa isang nakatagong patlang
        showForm(type); // Ipakita ang angkop na form base sa uri (SHS o kolehiyo)
    });

    $('#applicationForm').submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize(); // Seriyalisahin ang mga datos ng form
        var selectedOption = $('[name="selectedOption"]').val(); // Kunin ang piniling opsyon
        formData += '&selectedOption=' + encodeURIComponent(selectedOption); // Idagdag ang piniling opsyon sa form data
        $.ajax({
            type: 'POST',
            url: 'save_data.php', // URL ng script na PHP
            data: formData,
            success: function (response) {
                $('#applicationForm').hide();
                $('#referenceForm').show();
                console.log(response); // Itala ang tugon ng server
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
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
