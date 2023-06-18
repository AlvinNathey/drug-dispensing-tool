<?php
require_once("connection.php");
echo "</br>";
session_start();

    $SSN = $_POST["SSN"];
    $P_password = $_POST["P_password"];

    $sql = "SELECT * FROM tblpatients WHERE SSN = '$SSN' AND P_password = '$P_password' ";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login successful
        $row = $result->fetch_assoc();
        $_SESSION['SSN'] = $row['SSN'];
        $_SESSION['P_password'] = $row['P_password'];

        // Redirect the user based on user_type
        if ($_SESSION['SSN'] == 'gg') {
            header("Location: Admin.php");
        } else if ($_SESSION['SSN'] == 'pp') {
            header("Location: User.php");
        }
    } else {
        // Login failed
        echo "Invalid username or password";
    }

    $conn->close();
?>
