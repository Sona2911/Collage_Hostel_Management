<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            background-image: url("http://milgrasp.com/img/sections/features/hostel_management1.jpg");
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .dashboard-container {
            width: 800px;
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

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ghmsd";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if the admin is logged in, if not, redirect to the login page
        // You need to implement admin authentication
        // Example: if (!isset($_SESSION['admin'])) { header("Location: admin_login.php"); }

        $sql = "SELECT * FROM student_registration WHERE status = 'Pending'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h1>Student Registration Requests</h1>";
            echo "<table>";
            echo "<tr>";
            echo "<th>Student ID</th>";
            echo "<th>Name</th>";
            echo "<th>Email</th>";
            echo "<th>Action</th>";
            echo "</tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["studentID"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td><a href='approve_reject.php?studentID=" . $row["studentID"] . "&action=approve'>Approve</a> | 
                      <a href='approve_reject.php?studentID=" . $row["studentID"] . "&action=reject'>Reject</a></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No pending registration requests.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
