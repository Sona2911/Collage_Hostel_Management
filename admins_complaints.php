<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Complaints</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            background-image: url("http://milgrasp.com/img/sections/features/hostel_management1.jpg");
            background-size: cover;
            margin: 0;
            padding: 0;
            max-width: 1000px;
            /* max-width: 800px;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
             */
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;

        }

        h1 {
            text-align: center;
            color: #333;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 20px;
        }

        li {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px 0;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        li:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <h1>Admin Complaints</h1>

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

    // Retrieve complaints from the database
    $sql = "SELECT * FROM complaints";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display complaints in a list
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "<strong>Problem:</strong> " . $row["problem"] . "<br>";
            echo "<strong>Description:</strong> " . $row["description"] . "<br>";
            echo "<strong>Complaint Date:</strong> " . $row["complaint_date"] . "<br>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No complaints found.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>

