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
    $studentID = $_POST["studentID"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $course = $_POST["course"];
    $amount = $_POST["amount"];

    // Prepare and execute the SQL query to insert the data into the table
    $sql = "INSERT INTO fees_payments (studentID, name, email, course, amount)
            VALUES (' $studentID', '$name', '$email', '$course', '$amount')";

    if ($conn->query($sql) === TRUE) {
        echo "Payment submitted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

