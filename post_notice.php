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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the form
    $title = $_POST["notice-title"];
    $date = $_POST["notice-date"];
    $content = $_POST["notice-content"];

    // Prepare and execute the SQL query to insert the data into the table
    $sql = "INSERT INTO notices (title, date, content) VALUES ('$title', '$date', '$content')";

    if ($conn->query($sql) === TRUE) {
        echo "Notice posted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

