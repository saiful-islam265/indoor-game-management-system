<?php
class DatabaseInstaller {
	private $servername;
	private $username;
	private $password;
	private $dbname;

	public function __construct($servername, $username, $password, $dbname) {
		$this->servername = $servername;
		$this->username = $username;
		$this->password = $password;
		$this->dbname = $dbname;
	}

	public function createDatabaseAndTables() {
		$conn = new mysqli($this->servername, $this->username, $this->password);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Create database if it doesn't exist
		$createDatabaseQuery = "CREATE DATABASE IF NOT EXISTS " . $this->dbname;
		if ($conn->query($createDatabaseQuery) === TRUE) {
			echo "Database created successfully or already exists<br>";
		} else {
			echo "Error creating database: " . $conn->error;
		}

		// Select the created or existing database
		$conn->select_db($this->dbname);

		// Create table for game registration
		$createGameTableQuery = "
            CREATE TABLE IF NOT EXISTS games (
                id INT AUTO_INCREMENT PRIMARY KEY,
                gameName VARCHAR(255) NOT NULL,
                gameType VARCHAR(255) NOT NULL,
                boardNumber INT NOT NULL,
                maxPlayers INT NOT NULL
            )
        ";
		if ($conn->query($createGameTableQuery) === TRUE) {
			echo "Table 'games' created successfully or already exists<br>";
		} else {
			echo "Error creating table 'games': " . $conn->error;
		}

		// Create table for student registration
		$createStudentTableQuery = "
            CREATE TABLE IF NOT EXISTS students (
                id INT AUTO_INCREMENT PRIMARY KEY,
                studentName VARCHAR(255) NOT NULL,
                studentID VARCHAR(255) NOT NULL
            )
        ";
		if ($conn->query($createStudentTableQuery) === TRUE) {
			echo "Table 'students' created successfully or already exists<br>";
		} else {
			echo "Error creating table 'students': " . $conn->error;
		}

		// Create table for slot booking
		$createBookingTableQuery =
			"CREATE TABLE IF NOT EXISTS bookings (
                id INT AUTO_INCREMENT PRIMARY KEY,
                studentID VARCHAR(255) NOT NULL,
                gameID INT NOT NULL,
                slotDate DATE NOT NULL,
                slotTime TIME NOT NULL,
                FOREIGN KEY (studentID) REFERENCES students(id),
                FOREIGN KEY (gameID) REFERENCES games(id)
            )
        ";
		if ($conn->query($createBookingTableQuery) === TRUE) {
			echo "Table 'bookings' created successfully or already exists<br>";
		} else {
			echo "Error creating table 'bookings': " . $conn->error;
		}

		// Close the database connection
		$conn->close();
	}
}

// Replace 'your_server', 'your_username', 'your_password', and 'indoor_game_management_system'
// with your actual MySQL server details and desired database name.
$installer = new DatabaseInstaller('localhost', 'root', '', 'indoor-game-management');
$installer->createDatabaseAndTables();
