<?php
session_start();
include('../admin/config/config.php');

// Check if the form has been submitted
if(isset($_POST['submit'])){

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM admin_list WHERE username = '$username'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) > 0){
        $row = mysqli_fetch_assoc($query_run);
        $hashed_password = $row['password'];
        $role_as = $row['role_as'];

        if(password_verify($password, $hashed_password)){
            $_SESSION['username'] = $username;
            $_SESSION['role_as'] = $role_as;

            // Check role_as value and redirect accordingly
            if($role_as == 1){
                // $_SESSION['username'] = $username;
                header('Location: ../admin/index.php');
                exit();
            } else {
                // $_SESSION['username'] = $username;
                header('Location: ../clientpage/index.php');
                exit();
            }

        } else {
            $_SESSION['message'] = 'Invalid password';
            header('Location: ../login.php');
            exit();
        }
    } else {
        $_SESSION['message'] = 'Invalid username';
        header('Location: ../login.php');
        exit();
    }
}
?>

