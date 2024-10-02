<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            background-image: url("http://milgrasp.com/img/sections/features/hostel_management1.jpg");
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .registration-response {
            width: 400px;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        p {
            margin-top: 10px;
            color: #555;
        }

        .success {
            color: #4CAF50;
        }

        .error {
            color: #F44336;
        }
    </style>
</head>
<body>
    <div class="registration-response">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ghmsd";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $username = $_POST["username"];
            $password = $_POST["password"];
            $studentID = $_POST["studentID"];
            $name = $_POST["name"];
            $gender = $_POST["gender"];
            $dob = $_POST["dob"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $qualification = $_POST["qualification"];
            $courses = $_POST["courses"];
            $contact = $_POST["contact"];

            // Insert data into the database (You may need to add more fields depending on your requirements)
            $sql = "INSERT INTO student_registration (username, password, studentID, name, gender, dob, email, address, qualification, courses, contact, status) 
                    VALUES ('$username', '$password', '$studentID', '$name', '$gender', '$dob', '$email', '$address', '$qualification', '$courses', '$contact', 'Pending')";

            if ($conn->query($sql) === TRUE) {
                echo "<h1 class='success'>Thank you for registering!</h1>";
                echo "<p>Your registration is pending approval from the admin.</p>";
            } else {
                echo "<h1 class='error'>Error!</h1>";
                echo "<p>Registration failed. Please try again later.</p>";
                echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
