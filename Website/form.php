<?php
 if($_SERVER['REQUEST_METHOD']=='POST')
 {

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "manage"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

else{


$hospital_name = $_POST['hospital_name'];
$equipment_req= $_POST['equipment_req'];
$quantity= $_POST['quantity'];
$dob= $_POST['dob'];

$sql = "INSERT INTO `form_details`(`hospital_name`, `equipment_req`, `quantity`, `dob`) VALUES ('$hospital_name', '$equipment_req', '$quantity','$dob')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

 }
?>

<form  id="qr-form" action="form.php" method="POST">
                    <div class="form-group">
                        <label for="hospital_name">Hospital Name:</label>
                        <input type="text" id="hospital_name" name="hospital_name" required>
                    </div>
                    <div class="form-group">
                        <label for="equipment_req">Equipment Type:</label>
                        <input type="text" id="equipment_req" name="equipment_req" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Equipment Quantity:</label>
                        <input type="number" id="quantity" name="quantity" min="1" required>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Purchase:</label>
                        <input type="date" id="dob" name="dob" required>
                    </div>
                    <!--<button type="submit">Submit</button>-->
                    <button type="submit">Generate QR Code</button>
                    <button id="downloadBtn" type="download">Download QR Code</button>
                </form>