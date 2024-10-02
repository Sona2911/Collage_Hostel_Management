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
        // Database Connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ghmsd";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Desired total number of rooms
$desiredTotalRooms = 50;  // Set the total number of rooms to 50

// If the current total is less than the desired total, add rooms
if ($totalRooms < $desiredTotalRooms) {
    // ... rest of the code remains unchanged
}

        // Display Room Allocation Information
        $totalRoomsQuery = "SELECT COUNT(*) as totalRooms FROM room";
        $totalRoomsResult = $conn->query($totalRoomsQuery);
        $row = $totalRoomsResult->fetch_assoc();
        $totalRooms = $row['totalRooms'];

        $allocatedRoomsQuery = "SELECT COUNT(*) as allocatedRooms FROM room_allocations";
        $allocatedRoomsResult = $conn->query($allocatedRoomsQuery);
        $row = $allocatedRoomsResult->fetch_assoc();
        $allocatedRooms = $row['allocatedRooms'];

        $emptyRooms = $totalRooms - $allocatedRooms;

        echo "<h1>Room Allocation Information</h1>";
        echo "<p>Total Rooms: $totalRooms</p>";
        echo "<p>Allocated Rooms: $allocatedRooms</p>";
        echo "<p>Empty Rooms: $emptyRooms</p>";

        // Display Room Allocation Details
        $roomAllocationsQuery = "SELECT ra.*, r.capacity FROM room_allocations ra
                                JOIN room r ON ra.room_number = r.roomNumber";
        $roomAllocationsResult = $conn->query($roomAllocationsQuery);

        if ($roomAllocationsResult->num_rows > 0) {
            echo "<h2>Room Allocation Details</h2>";
            echo "<table>";
            echo "<tr>";
            echo "<th>Student ID</th>";
            echo "<th>Room Number</th>";
            echo "<th>Capacity</th>";
            echo "<th>Allocate Date</th>";
            echo "</tr>";

            while ($row = $roomAllocationsResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["student_id"] . "</td>";
                echo "<td>" . $row["room_number"] . "</td>";
                echo "<td>" . $row["capacity"] . "</td>";
                echo "<td>" . $row["allocate_date"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No room allocations found.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
