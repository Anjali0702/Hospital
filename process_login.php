<?php
// Start session
include('connect.php');
$conn = mysqli_connect('localhost','root','','appointment') or die('connection failed');
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
session_start();

// Process form data
$email = $_POST['email'];
$password = $_POST['password'];

// Check if doctor exists in database
$sql = "SELECT * FROM tbldoctor WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// Login successful
	$row = $result->fetch_assoc();
	$_SESSION['doctor_id'] = $row['id'];
	$_SESSION['doctor_name'] = $row['name'];
	$_SESSION['doctor_email'] = $row['email'];
	$_SESSION['doctor_license'] = $row['license'];
	$_SESSION['doctor_specialty'] = $row['specialty'];
	
	header("Location: dashboard.php");
} else {
	// Login failed
	echo "Invalid email or password.";
}

$conn->close();
?>
