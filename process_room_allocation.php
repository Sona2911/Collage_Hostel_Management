<?php
// Include your database connection code here

// Assuming you have a database connection already established
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ghmsd";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $studentId = $_POST["studentid"];
    $roomNumber = $_POST["roomnumber"];
    $allocateDate = $_POST["allocatedate"];

    // Ensure that you have a valid database connection ($conn)
    // Insert the data into the database
    $sql = "INSERT INTO room_allocations (student_id, room_number, allocate_date) VALUES ('$studentId', '$roomNumber', '$allocateDate')";

    if ($conn->query($sql) === TRUE) {
        echo "Room allocated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
