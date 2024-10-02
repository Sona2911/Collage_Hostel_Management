<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .dashboard-container {
            width: 600px;
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
    <div class="dashboard-container">
        <?php
        // Include your database connection code here

        // Check if the student is logged in, if not, redirect to the login page
        // Example: if (!isset($_SESSION['student'])) { header("Location: student_login.php"); }

        $studentID = "1234"; // Replace this with the actual student ID (you can get it after student login)

        $sql = "SELECT * FROM student_registration WHERE studentID = '$studentID' AND status = 'Approved'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Your Registration Details</h2>";
            echo "<table>";
            echo "<tr>";
            echo "<th>Student ID</th>";
            echo "<th>Name</th>";
            echo "<th>Email</th>";
            echo "<th>Status</th>";
            echo "</tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["studentID"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No approved registration details found for this student.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
