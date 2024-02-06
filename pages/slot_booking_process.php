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
	$studentID = $_POST["studentID"];
	$gameID = $_POST["gameID"];
	$slotDate = $_POST["slotDate"];
	$slotTime = $_POST["slotTime"];

	// Validate form data (add more validation as needed)
	$check_table_query = "SHOW TABLES LIKE 'bookings'";
	
	$table_result = $conn->query($check_table_query);
	if ($table_result->num_rows == 0) {
		// Table doesn't exist, create it
		$create_table_query = "CREATE TABLE bookings (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			studentID INT(60) NOT NULL,
			gameID INT(60) NOT NULL,
			slotDate DATE NOT NULL,
			slotTime TIME NOT NULL
		)";
		$conn->query($create_table_query);
	}

	// Check for slot conflicts
	$conflictCheck = "SELECT * FROM bookings WHERE gameID = '$gameID' AND slotDate = '$slotDate' AND slotTime = '$slotTime'";
	$conflictResult = $conn->query($conflictCheck);

	if ($conflictResult->num_rows > 0) {
		// Conflict found, display an error message
		echo "Slot booking failed. The slot is already booked by another student.";
	} else {
		// No conflict, proceed with the booking

		$insertBooking = "INSERT INTO bookings (studentID, gameID, slotDate, slotTime) VALUES ('$studentID', '$gameID', '$slotDate', '$slotTime')";

		if ($conn->query($insertBooking) === TRUE) {
			header("Location: ../index.php");
			exit;
		} else {
			echo "Error: " . $insertBooking . "<br>" . $conn->error;
		}
	}
}

// Close the database connection
$conn->close();
