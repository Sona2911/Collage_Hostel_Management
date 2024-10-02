<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <style>
        /* Your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            background-image: url("http://milgrasp.com/img/sections/features/hostel_management1.jpg");
            background-size: cover;
            margin: 0;
            padding: 0;
            overflow: visible;
        }

        .student-details-table {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            overflow: visible;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <div class="student-dashboard">
        <h1>Welcome to Your  Details</h1>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="studentid">Enter Student ID:</label>
            <input type="text" id="studentid" name="studentid" required>
            <button type="submit">Show Details</button>
        </form>

        <?php
    // PHP code for fetching and displaying student details
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ghmsd";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get student ID from the form
        $studentId = $_POST["studentid"];

        // Query to fetch student details
        $sql = "SELECT * FROM students WHERE studentID = $studentId";

        $result = $conn->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                // Output data of the student in a table
                echo "<div class='student-details-table'>";
                echo "<h1>Student Details</h1>";
                echo "<table>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th>Field</th>";
                    echo "<th>Details</th>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>Student ID</td>";
                    echo "<td>" . $row["studentID"] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>Name</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>Email</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>Address</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>Contact</td>";
                    echo "<td>" . $row["contact"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
            } else {
                echo "No student details found.";
            }
        } else {
            // Handle SQL error
            echo "Error: " . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
    ?>
</body>
</html>
