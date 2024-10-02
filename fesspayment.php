<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fee Details</title>
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

        .fee-details-table {
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

    <?php
    // PHP code for fetching and displaying student fee details
    // Assuming you have a database connection already established
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ghmsd";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Assuming you have a session variable storing the student ID after successful login
    session_start();
   
    // Fetch student ID from fees_payments table
    $sql = "SELECT * FROM student_registration ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $studentID = $row["studentID"];

        // Query to fetch student fee details
        $sql = "SELECT * FROM fees_payments WHERE studentID = $studentID";
        $result = $conn->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                // Output data of the student fee details in a table
                echo "<div class='fee-details-table'>";
                echo "<h1>Fee Details</h1>";
                echo "<table>";
                while ($row = $result->fetch_assoc()) {
                    // Display fee details
                    echo "<tr>";
                    echo "<td>studentID</td>";
                    echo "<td>" . $row["studentID"] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Name</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>Payment Amount</td>";
                    echo "<td>" . $row["amount"] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>Course</td>";
                    echo "<td>" . $row["course"] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>Email</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
            } else {
                echo "No fee details found.";
            }
        } else {
            // Handle SQL error
            echo "Error: " . $conn->error;
        }
    } else {
        echo "No student ID found in fees_payments table.";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>

