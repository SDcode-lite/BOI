<?php
session_start();
include('../admin/config/config.php');


//Insert form data into database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['username'];
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $mname = mysqli_real_escape_string($conn, $_POST['mname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $kinname = mysqli_real_escape_string($conn, $_POST['kinname']);
    $kinphone = mysqli_real_escape_string($conn, $_POST['kinphone']);
    $kinaddress = mysqli_real_escape_string($conn, $_POST['kinaddress']);
    $kinrel = mysqli_real_escape_string($conn, $_POST['kinrel']);
    $accname = mysqli_real_escape_string($conn, $_POST['accname']);
    $accno = mysqli_real_escape_string($conn, $_POST['accno']);
    $bankname = mysqli_real_escape_string($conn, $_POST['bankname']);

    // Check if the username already exists
    $check_sql = "SELECT * FROM register WHERE username='$username'";
    $result = $conn->query($check_sql);
    if ($result->num_rows > 0) {
        $_SESSION['message'] = "User already registered.";
        header('Location: ../clientpage/index.php');
    } else {
        $_SESSION['fname'] = $fname;

        $sql = "INSERT INTO register (username, first_name, middle_name, last_name, address, phone_number, email, kinname, kinphone, kinaddress, kinrel, account_name, account_number, bank_name) VALUES ('$username','$fname', '$mname', '$lname', '$address', '$phone', '$email', '$kinname', '$kinphone', '$kinaddress', '$kinrel', '$accname', '$accno', '$bankname')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['message'] = "Your registration has been submitted successfully.";
            header('Location: ../clientpage/index.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Process the form data and insert into the database
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $fname = $_POST["fname"];
//     $mname = $_POST["mname"];
//     $lname = $_POST["lname"];
//     $address = $_POST["address"];
//     $phone = $_POST["phone"];
//     $email = $_POST["email"];
//     $kinname = $_POST["kinname"];
//     $kinphone = $_POST["kinphone"];
//     $kinaddress = $_POST["kinaddress"];
//     $kinrel = $_POST["kinrel"];
//     $accname = $_POST["accname"];
//     $accno = $_POST["accno"];
//     $bankname = $_POST["bankname"];

//     $sql = "INSERT INTO client_info (fname, mname, lname, address, phone, email, kinname, kinphone, kinaddress, kinrel, accname, accno, bankname)
//             VALUES ('$fname', '$mname', '$lname', '$address', '$phone', '$email', '$kinname', '$kinphone', '$kinaddress', '$kinrel', '$accname', '$accno', '$bankname')";

//     if (mysqli_query($conn, $sql)) {
//         echo "Data saved successfully!";
//     } else {
//         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//     }
// }

// Close the database connection
mysqli_close($conn);
?>

$conn->close();
?>