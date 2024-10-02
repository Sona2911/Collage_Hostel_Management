<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Fees Payments</title>
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

        .admin-fees-payments {
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="admin-fees-payments">
        <h1>Admin Fees Payments</h1>

        <?php
        // Assuming you have a database connection already established
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ghmsd";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve fees payments from the database
        $sql = "SELECT * FROM fees_payments";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display fees payments in a table
            echo "<table>";
            echo "<tr><th>Student ID</th><th>Name</th><th>Email</th><th>Course</th><th>Amount</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["studentID"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["course"] . "</td>";
                echo "<td>" . $row["amount"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No fees payments found.";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>

