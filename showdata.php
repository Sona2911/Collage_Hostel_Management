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

// Assuming you have the student's ID
$studentId = 123; // Replace with the actual student ID

// Query to fetch room details for the student
$sql = "SELECT room_allocations.room_number, room_allocations.allocate_date
        FROM room_allocations
        WHERE room_allocations.student_id = $studentId";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "Room Number: " . $row["room_number"] . "<br>";
        echo "Allocation Date: " . $row["allocate_date"] . "<br>";
    }
} else {
    echo "No room details found for the student.";
}

// Close the database connection
$conn->close();
?>

