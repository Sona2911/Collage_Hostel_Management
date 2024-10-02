<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Notice Board</title>
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

        .student-notice-board {
            max-width: 800px;
            margin: 0 auto;
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

        .notice {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="student-notice-board">
        <h1>Student Notice Board</h1>

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

        // Retrieve notices from the database
        $sql = "SELECT * FROM notices ORDER BY date DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<div class="notice">';
                echo '<h2>' . $row["title"] . '</h2>';
                echo '<p><strong>Date:</strong> ' . $row["date"] . '</p>';
                echo '<p>' . $row["content"] . '</p>';
                echo '</div>';
            }
        } else {
            echo "No notices available.";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>

