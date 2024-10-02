<?php
// Include your database connection code here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ghmsd";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve room change requests from the database
$sql = "SELECT * FROM room_change_request";
$result = $conn->query($sql);

if (!$result) {
    die("Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            background-image: url("http://milgrasp.com/img/sections/features/hostel_management1.jpg");
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        .admin-dashboard {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
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
            padding: 12px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="admin-dashboard">
        <h1> Room Change Requests</h1>
        <?php
        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Current Room</th>
                        <th>Desired Room</th>
                        <th>Reason</th>
                        
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        
                        <td>{$row['studentid']}</td>
                        <td>{$row['studentname']}</td>
                        <td>{$row['current_room']}</td>
                        <td>{$row['desired_room']}</td>
                        <td>{$row['reason']}</td>
                        
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "No room change requests.";
        }
        ?>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>

