<?php
include('connect.php');
$conn = mysqli_connect('localhost','root','','appointment') or die('connection failed');
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Process form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$license = $_POST['license'];
$specialty = $_POST['specialty'];

// Check if doctor already exists
$sql = "SELECT * FROM tbldoctor WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "Doctor already exists with this email address. Please login!";
} else {
	// Insert new doctor into database
	$sql = "INSERT INTO tbldoctor (name, email, password, license, specialty) VALUES ('$name', '$email', '$password', '$license', '$specialty')";
	if ($conn->query($sql) === TRUE) {
		echo "Doctor signup successful!";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

$conn->close();
?>
