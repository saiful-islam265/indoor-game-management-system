<?php include 'header.php'; ?>
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

				// Close the database connection
				$conn->close();
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
