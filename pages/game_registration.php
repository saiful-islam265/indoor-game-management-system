<!-- game_registration.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css"> <!-- You can add your custom styles here -->
</head>
<body>
<div class="container mt-5">
    <h2>Game Registration</h2>
    <form action="game_registration_process.php" method="post">
        <div class="form-group">
            <label for="gameName">Game Name:</label>
            <input type="text" class="form-control" id="gameName" name="gameName" required>
        </div>
        <div class="form-group">
            <label for="gameType">Game Type:</label>
            <input type="text" class="form-control" id="gameType" name="gameType" required>
        </div>
        <div class="form-group">
            <label for="boardNumber">Board Number:</label>
            <input type="number" class="form-control" id="boardNumber" name="boardNumber" required>
        </div>
        <div class="form-group">
            <label for="maxPlayers">Max Players:</label>
            <input type="number" class="form-control" id="maxPlayers" name="maxPlayers" required>
        </div>
        <button type="submit" class="btn btn-primary">Register Game</button>
    </form>

    <br>

    <a href="../index.php" class="btn btn-secondary">Go Back to Home Page</a>
</div>

<!-- Bootstrap JS and Popper.js (required for some Bootstrap components) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
