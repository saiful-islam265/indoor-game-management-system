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
	$studentID = $_POST["studentID"];
	$gameID = $_POST["gameID"];
	$slotDate = $_POST["slotDate"];
	$slotTime = $_POST["slotTime"];

	// Validate form data (add more validation as needed)

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
			echo "Slot booking successful!";
		} else {
			echo "Error: " . $insertBooking . "<br>" . $conn->error;
		}
	}
}

// Close the database connection
$conn->close();
