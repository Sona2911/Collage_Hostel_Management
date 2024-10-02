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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the form
    $studentId = $_POST["studentid"];
    $studentName = $_POST["studentname"];
    $currentRoom = $_POST["currentRoom"];
    $desiredRoom = $_POST["desiredRoom"];
    $reason = $_POST["reason"];

    // Prepare and execute the SQL query to insert the data into the table
    $sql = "INSERT INTO room_change_request (studentid, studentname, current_room, desired_room, reason) 
            VALUES ('$studentId', '$studentName', '$currentRoom', '$desiredRoom', '$reason')";

    if ($conn->query($sql) === TRUE) {
        echo "Room change request submitted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
