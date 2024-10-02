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

// Assuming you have a student ID, you can replace it with the actual student ID from the session
$studentID = 1;

// Retrieve room details for the student from room_allocation table
$sql = "SELECT room_number
        FROM room_allocations 
        JOIN students  ON student_id = student_id
        WHERE student_id = $studentID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $roomNumber = $row['room_number'];
    

    echo "<h2>Your Room Details</h2>";
    echo "<p>Room Number: $roomNumber</p>";
    
} else {
    echo "Room details not found for the student.";
}

// Close the database connection
$conn->close();
?>