<?php
// Start the session
session_start();

// Check if the admin is logged in
if(isset($_SESSION['logging']) && $_SESSION['logging'] === true){
    // If logged in, destroy the session
    session_destroy();
    // Redirect the admin to the homepage (homepage.html)
    header("location: ../homepage.html");
    exit();
} else {
    // If not logged in, you can handle this case differently
    // For example, you can redirect them to the login page or display a message
    header("location: ../adminlogin.html");
    exit();
}
?>
