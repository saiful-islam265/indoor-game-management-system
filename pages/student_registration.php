<!-- student_registration.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css"> <!-- You can add your custom styles here -->
</head>
<body>
<div class="container mt-5">
    <h2>Student Registration</h2>
    <form action="student_registration_process.php" method="post">
        <div class="form-group">
            <label for="studentName">Student Name:</label>
            <input type="text" class="form-control" id="studentName" name="studentName" required>
        </div>
        <div class="form-group">
            <label for="studentID">Student ID:</label>
            <input type="text" class="form-control" id="studentID" name="studentID" required>
        </div>
        <button type="submit" class="btn btn-primary">Register Student</button>
    </form>

    <br>

    <a href="/index.php" class="btn btn-secondary">Go Back to Home Page</a>
</div>

<!-- Bootstrap JS and Popper.js (required for some Bootstrap components) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
