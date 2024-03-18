<?php
require_once("connection.php");
session_start();

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $usertype = $_POST["usertype"];
        $gender = $_POST["usergender"];
        $password = $_POST["password"];

        $sql = "INSERT INTO tblusers (username, password, usertype, gender) 
                VALUES ('$username', '$password', '$usertype','$gender')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('User $username created successfully')</script>";
            $_SESSION['username'] = $username;

            if ($usertype == "patient") {
                header("Location: patientsignup.html");
            } elseif ($usertype == "doctor") {
                header("Location: doctorsignup.html");
            } elseif ($usertype == "pharmacist") {
                header("Location: pharmacistsignup.html");
            } elseif ($usertype == "admin") {
                header("Location: adminsignup.php");
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} catch (Exception $e) {
    header("Location: usersignup.html");
    echo "<script>alert('Error')</script>";
}
?>
