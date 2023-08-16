<?php
session_start();
include('../admin/config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    $stmt = $conn->prepare("INSERT INTO contact_mes (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Your Message has been sent to the ADMIN, you will be notified through your mail.";
    } else {
        $_SESSION['message'] = "An error occurred while sending your message. Please try again later.";
    }

    $stmt->close();
}

mysqli_close($conn);
header('Location: ../contactus.php');
