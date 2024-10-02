<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
    <style>
        /* Your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .confirmation-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        p {
            text-align: center;
            font-size: 18px;
        }

        button {
            display: block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <h1>Payment Confirmation</h1>
        <p>Your payment was successful!</p>
       
        <?php
        // Display payment details
        if (isset($_GET['studentID']) && isset($_GET['name']) && isset($_GET['course']) && isset($_GET['amount']) && isset($_GET['feesAmount'])) {
            $studentID = $_GET['studentID'];
            $name = $_GET['name'];
            $course = $_GET['course'];
            $amount = $_GET['amount'];
            $feesAmount = $_GET['feesAmount'];

            echo "<p>Student ID: $studentID</p>";
            echo "<p>Name: $name</p>";
            echo "<p>Course: $course</p>";
            echo "<p>Amount Paid: $amount</p>";
            echo "<p>Fees Amount: $feesAmount</p>";
        }
        ?>

        <button onclick="window.location.href='student_dashboard.php'">Go to Dashboard</button>
    </div>
</body>
</html>

