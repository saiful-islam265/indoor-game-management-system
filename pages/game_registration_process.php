<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'indoor-game-management';

$conn = new mysqli($servername, $username, $password, $dbname );

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Retrieve form data
	$gameName = $_POST["gameName"];
	$gameType = $_POST["gameType"];
	$boardNumber = $_POST["boardNumber"];
	$maxPlayers = $_POST["maxPlayers"];

	$check_table_query = "SHOW TABLES LIKE 'games'";
	
	$table_result = $conn->query($check_table_query);
	if ($table_result->num_rows == 0) {
		// Table doesn't exist, create it
		$create_table_query = "CREATE TABLE games (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			gameName VARCHAR(255) NOT NULL,
			gameType VARCHAR(255) NOT NULL,
			boardNumber INT(6) NOT NULL,
			maxPlayers INT(10) NOT NULL
		)";
		$conn->query($create_table_query);
	}
	$sql = "INSERT INTO games (gameName, gameType, boardNumber, maxPlayers) VALUES ('$gameName', '$gameType', '$boardNumber', '$maxPlayers')";

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
