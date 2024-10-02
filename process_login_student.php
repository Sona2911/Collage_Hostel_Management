<?php
// Include your database connection code here
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "ghmsd";

// Create connection
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Retrieve the hashed password from the database
    $sql = "SELECT * FROM student_registration WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["password"];

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            header("Location:studentdashboard.html");
            // Redirect to the admin dashboard or perform other actions
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "Invalid username or password";
    }

    // Close the database connection
    $conn->close();
}
?>
