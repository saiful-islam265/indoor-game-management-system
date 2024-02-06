<?php
// Assuming you have a connection to the database established
$servername = "your_server_name";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Retrieve form data
	$studentName = $_POST["studentName"];
	$studentID = $_POST["studentID"];

	// Validate form data (add more validation as needed)

	// Insert data into the database
	$sql = "INSERT INTO students (studentName, studentID) VALUES ('$studentName', '$studentID')";

	if ($conn->query($sql) === TRUE) {
		echo "Student registration successful!";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

// Close the database connection
$conn->close();
?>
