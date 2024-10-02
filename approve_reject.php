<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ghmsd";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the admin is logged in, if not, redirect to the login page
// You need to implement admin authentication
// Example: if (!isset($_SESSION['admin'])) { header("Location: admin_login.php"); }


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $studentID = $_GET["studentID"];
    $action = $_GET["action"]; // 'approve' or 'reject'
 // Process the approval or rejection
    if ($action == 'approve') {
    $status = 'Approved';
    } elseif ($action == 'reject') {
    $status = 'Rejected';
    } else {
    die("Invalid action");
    }
    // Update the status based on the action
    $status = ($action == 'approve') ? 'Approved' : 'Rejected';

    $updateSql = "UPDATE student_registration SET status = '$status' WHERE studentID = '$studentID'";
    
    if ($conn->query($updateSql) === TRUE) {
        echo "Request $action successfully for student with ID: $studentID";
        // You may also send a notification to the student here
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
