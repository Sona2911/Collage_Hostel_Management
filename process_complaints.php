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
    $problem = $_POST["Problem"];
    $description = $_POST["Description"];
    $complaintDate = $_POST["complaintDate"];

    // Prepare and execute the SQL query to insert the data into the table
    $sql = "INSERT INTO complaints (problem, description, complaint_date)
            VALUES ('$problem', '$description', '$complaintDate')";

    if ($conn->query($sql) === TRUE) {
        echo "Complaint submitted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
