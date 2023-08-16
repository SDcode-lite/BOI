<?php
session_start();
include("../../admin/config/config.php");
// Check if the form has been submitted
if (isset($_POST['with_btn'])) {
    // Get the values from the form
    $plan = mysqli_real_escape_string($conn, $_POST['plan']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $date_requested = date('Y-m-d'); // Get the current date for date_requested
    $status = 0; // Set the initial status to 0 (pending)
    //Get the total profit 
    $profit = $_SESSION['tProfit'];
    // Get the username from the session
    $username = $_SESSION['username'];
    $sql = "SELECT plan FROM user_data WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $userPlan = $row['plan'];

        if ($userPlan != $plan) {
            $_SESSION['message'] = 'You do not belong to this plan. Select the correct plan';
            header("Location: ../withdrawal.php");
            exit();
        }


    }else{
        echo "Error retrieving user details: " . mysqli_error($conn);
        exit();
    }

    if($amount > $profit){
            $_SESSION['message'] = "Your total Profit is Less than the amount you want to withdraw";
            header('Location: ../withdrawal.php');
        }
        $existingSql = "SELECT * FROM withdrawal WHERE username='$username'";
        $existingResult = mysqli_query($conn, $existingSql);

        if ($existingResult && mysqli_num_rows($existingResult) > 0){
            $_SESSION['message'] = "You already have a pending withdrawal request.";
            header('Location: ../withdrawal.php');
            exit();
        }
        
        else{
        // Insert the values into the database
        $sql = "INSERT INTO withdrawal (username, plan, amount, date_requested)
                VALUES ('$username', '$plan', '$amount', '$date_requested')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['message'] = "Withdrawal request submitted successfully for Approval.";
            header('Location: ../index.php');
            exit();
        } else {
            echo "Error inserting record: " . mysqli_error($conn);
            exit();
        }
    }
}
?>