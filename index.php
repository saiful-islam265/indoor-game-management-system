<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>University Common Room Game Management System</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="/">Game Management System</a>
	<ul class="navbar-nav mr-auto">
		<li class="nav-item"><a class="nav-link" href="pages/game_registration.php">Game Registration</a></li>
		<li class="nav-item"><a class="nav-link" href="pages/student_registration.php">Student Registration</a></li>
		<li class="nav-item"><a class="nav-link" href="pages/slot_booking.php">Slot Booking</a></li>
	</ul>
</nav>
<div class="container mt-5">
        <h2>Student Games and Slots</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Registered Game</th>
                    <th>Slot Date</th>
                    <th>Slot Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
				// Establish database connection
				$servername = 'localhost';
				$username = 'root';
				$password = '';
				$dbname = 'indoor-game-management';

				$conn = new mysqli($servername, $username, $password, $dbname);

				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				// Fetch data from the database
				$sql = "
					SELECT students.studentName, games.gameName, bookings.slotDate, bookings.slotTime
					FROM students
					INNER JOIN bookings ON students.id = bookings.studentID
					INNER JOIN games ON bookings.gameID = games.id
				";
				$result = $conn->query($sql);
				print_r($result);

				// Close the database connection
				//$conn->close();
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["studentName"] . "</td>";
                        echo "<td>" . $row["gameName"] . "</td>";
                        echo "<td>" . $row["slotDate"] . "</td>";
                        echo "<td>" . $row["slotTime"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No data available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
