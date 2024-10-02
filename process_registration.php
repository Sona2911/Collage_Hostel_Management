<?php
// Replace these values with your actual database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ghmsd";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password
    $studentID = $_POST["studentID"];
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $qualification = $_POST["qualification"];
    $courses = $_POST["courses"];
    $contact = $_POST["contact"];

    // Insert the data into the database
    $sql = "INSERT INTO students (username, password, studentID, name, gender, dob, email, address, qualification, courses, contact)
            VALUES ('$username', '$password', '$studentID', '$name', '$gender', '$dob', '$email', '$address', '$qualification', '$courses', '$contact')";

    if ($conn->query($sql) === TRUE) {
        echo "Student registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
