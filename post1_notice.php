<?php
// Assuming you have a database connection established
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ghmsd";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have form values to insert into the database
// $title = "fresher's party in hostel";
// $date = "2023-11-24";
// $content = "fresher's party in hostel";
$title = $_POST["notice-title"];
$date = $_POST["notice-date"];
$content = $_POST["notice-content"];

// Use prepared statement to avoid SQL injection
$stmt = $conn->prepare("INSERT INTO notices (title, date, content) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $title, $date, $content);

// Execute the statement
if ($stmt->execute()) {
    echo "Record inserted successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
