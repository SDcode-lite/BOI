<?php
session_start();
include("../../admin/config/config.php");
// Check if the form has been submitted

// Get the user input from the form
$username = $_SESSION['username'];
$plan = $_POST['plan'];
$amount = $_POST['amount'];

// Validate and sanitize user input to prevent SQL injection attacks
$username = filter_var($username, FILTER_SANITIZE_STRING);
$plan = filter_var($plan, FILTER_SANITIZE_STRING);
$amount = filter_var($amount, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

// Escape the user input to prevent SQL injection attacks
$username = mysqli_real_escape_string($conn, $username);
$plan = mysqli_real_escape_string($conn, $plan);
$amount = mysqli_real_escape_string($conn, $amount);
$_SESSION['dep-amount'] = $amount;

// Insert the data into a temporary table in the database
$sql = "INSERT INTO temporary_data (username, plan, amount, date_submitted) 
        VALUES ('$username', '$plan', '$amount', NOW())";

if (mysqli_query($conn, $sql)) {
    // Data was inserted successfully
        $_SESSION['message'] = "Your deposit has been sent to Admin successfully for Approvals.";
        header('Location: ../index.php');
} else {
    // Error inserting data
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

?>