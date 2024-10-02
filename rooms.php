<?php
// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ghmsd";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check the current total number of rooms
$totalRoomsQuery = "SELECT COUNT(*) as totalRooms FROM rooms";
$totalRoomsResult = $conn->query($totalRoomsQuery);
$row = $totalRoomsResult->fetch_assoc();
$totalRooms = $row['totalRooms'];

// Desired total number of rooms
$desiredTotalRooms = 50;

// If the current total is less than the desired total, add rooms
if ($totalRooms < $desiredTotalRooms) {
    $roomsToAdd = $desiredTotalRooms - $totalRooms;

    for ($i = 1; $i <= $roomsToAdd; $i++) {
        $roomNumber = $totalRooms + $i;
        $capacity = 3;  // You can set the capacity as needed
        $status = 'Vacant';

        $insertRoomQuery = "INSERT INTO rooms (roomNumber, capacity, status) VALUES ('$roomNumber', '$capacity', '$status')";
        $conn->query($insertRoomQuery);
    }

    echo "Added $roomsToAdd rooms to reach the desired total of $desiredTotalRooms.";
} else {
    echo "The total number of rooms is already $desiredTotalRooms.";
}

// Continue with the rest of your code to display room information
// ...

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        p {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Display Room Allocation Information
        // ... Continue with the rest of your code
        ?>

    </div>
</body>
</html>
