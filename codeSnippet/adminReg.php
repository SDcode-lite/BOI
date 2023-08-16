<?php
session_start();
include('../admin/config/config.php');

if (isset($_POST['adminReg'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $testrole = mysqli_real_escape_string($conn, $_POST['checkbox']);
    
    if($testrole === 1){
        $role = 1;
    }else{
        $role = 0;
    }

    // Confirm password
    if ($password === $confirm_password) {
        // Check if username exists
        $checkusername = "SELECT username FROM admin_list WHERE username = ?";
        $stmt = $conn->prepare($checkusername);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Username already exists
            $_SESSION['message'] = "User already exists";
            header("Location: ../admin/index.php");
            exit(0);
        } else {
            // Hash the password and store in the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $insert_query = "INSERT INTO admin_list (username,password, role_as) VALUES (?, ?, $role)";
            $stmt = $conn->prepare($insert_query);
            $stmt->bind_param("ss", $username, $hashed_password);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                // Registration successful
                $_SESSION['message'] = "User added successfully";
                header("Location: ../admin/index.php");
                exit(0);
            } else {
                // Registration failed
                $_SESSION['message'] = "Something went wrong";
                header("Location: ../admin/index.php");
                exit(0);
            }
        }
    } else {
        // Passwords do not match
        $_SESSION['message'] = "Confirm password and password are not the same";
        header("Location: ../admin/index.php");
        exit(0);
    }
} else {
    // Form not submitted
    header("Location: ../admin/index.php");
    exit(0);
}



?>
