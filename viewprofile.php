<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ghmsd";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the student is logged in, if not, redirect to the login page
// (You need to implement student authentication)
// Example: if (!isset($_SESSION['student'])) { header("Location: student_login.php"); }

$studentID = "1234"; // Replace this with the actual student ID (you can get it after student login)

$sql = "SELECT * FROM student_registration WHERE studentID = '$studentID' AND status = 'Approved'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Approved Student Registration Details</h1>";
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Student ID</th>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Status</th>";
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["studentID"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No approved registration details found for this student.";
}

$conn->close();
?>
