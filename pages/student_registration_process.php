<?php
// Assuming you have a connection to the database established
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'indoor-game-management';

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

	$check_table_query = "SHOW TABLES LIKE 'students'";
	
	$table_result = $conn->query($check_table_query);
	if ($table_result->num_rows == 0) {
		// Table doesn't exist, create it
		$create_table_query = "CREATE TABLE students (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			studentName VARCHAR(255) NOT NULL,
			studentID INT(11) NOT NULL
		)";
		$conn->query($create_table_query);
	}

	// Insert data into the database
	$sql = "INSERT INTO students (studentName, studentID) VALUES ('$studentName', '$studentID')";

	if ($conn->query($sql) === TRUE) {
		header("Location: ../index.php");
		exit;
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

// Close the database connection
$conn->close();
?>
