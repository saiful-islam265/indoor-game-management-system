<?php include '../header.php'; ?>
    <h2>Slot Booking</h2>
    <form action="slot_booking_process.php" method="post">
        <div class="form-group">
            <label for="studentID">Student ID:</label>
            <select class="form-control" id="studentID" name="studentID" required>
                    <?php
                    $servername = 'localhost';
                    $username = 'root';
                    $password = '';
                    $dbname = 'indoor-game-management';

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch registered students from the database
                    $sql = "SELECT id, studentName FROM students";
                    $result = $conn->query($sql);

                    // Display students as options in the select dropdown
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["id"] . "'>" . $row["studentName"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No registered students</option>";
                    }

                    $conn->close();
                    ?>
                </select>
        </div>
        <div class="form-group">
            <label for="gameID">Game ID:</label>
            <select class="form-control" id="gameID" name="gameID" required>
                    <?php
                    $servername = 'localhost';
                    $username = 'root';
                    $password = '';
                    $dbname = 'indoor-game-management';

                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch registered games from the database
                    $sql = "SELECT id, gameName FROM games";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["id"] . "'>" . $row["gameName"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No registered games</option>";
                    }
                    $conn->close();
                    ?>
                </select>
        </div>
        <div class="form-group">
            <label for="slotDate">Slot Date:</label>
            <input type="date" class="form-control" id="slotDate" name="slotDate" required>
        </div>
        <div class="form-group">
            <label for="slotTime">Slot Time:</label>
            <input type="time" class="form-control" id="slotTime" name="slotTime" required>
        </div>
        <button type="submit" class="btn btn-primary">Book Slot</button>
    </form>

    <br>

    <a href="../index.php" class="btn btn-secondary">Go Back to Home Page</a>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
