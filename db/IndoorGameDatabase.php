<?php
class IndoorGameDatabase {
	private $servername = "your_server_name";
	private $username = "your_username";
	private $password = "your_password";
	private $dbname = "indoor_game_management_system"; // Change to your actual database name
	private $conn;

	// Constructor to establish a database connection
	public function __construct() {
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

		// Check connection
		if ($this->conn->connect_error) {
			die("Connection failed: " . $this->conn->connect_error);
		}
	}

	// Destructor to close the database connection
	public function __destruct() {
		$this->conn->close();
	}

	// Execute a SQL query
	public function executeQuery($sql) {
		return $this->conn->query($sql);
	}

	// Insert data into a table
	public function insertData($tableName, $data) {
		$columns = implode(", ", array_keys($data));
		$values = "'" . implode("', '", array_values($data)) . "'";
		$sql = "INSERT INTO $tableName ($columns) VALUES ($values)";

		return $this->executeQuery($sql);
	}

	// Update data in a table
	public function updateData($tableName, $data, $condition) {
		$updates = "";
		foreach ($data as $key => $value) {
			$updates .= "$key = '$value', ";
		}
		$updates = rtrim($updates, ", ");
		$sql = "UPDATE $tableName SET $updates WHERE $condition";

		return $this->executeQuery($sql);
	}

	// Delete data from a table
	public function deleteData($tableName, $condition) {
		$sql = "DELETE FROM $tableName WHERE $condition";

		return $this->executeQuery($sql);
	}

	// Fetch a single row from a table based on a condition
	public function fetchSingleRow($tableName, $condition) {
		$sql = "SELECT * FROM $tableName WHERE $condition";
		$result = $this->executeQuery($sql);

		return ($result->num_rows > 0) ? $result->fetch_assoc() : null;
	}

	// Fetch all rows from a table based on a condition
	public function fetchAllRows($tableName, $condition = "") {
		$sql = "SELECT * FROM $tableName";
		if (!empty($condition)) {
			$sql .= " WHERE $condition";
		}
		$result = $this->executeQuery($sql);

		return ($result->num_rows > 0) ? $result->fetch_all(MYSQLI_ASSOC) : array();
	}
}

?>
