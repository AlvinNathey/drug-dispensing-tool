<?php
// dispensedrug.php

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["SSN"]) && isset($_POST["f_name"]) && isset($_POST["drug_name"]) && isset($_POST["drug_prize"])) {
    // Process the POST data from the AJAX request
    $SSN = $_POST["SSN"];
    $f_name = $_POST["f_name"];
    $drug_name = $_POST["drug_name"];
    $drug_prize = $_POST["drug_prize"];

    // Assuming you have a connection to the database
    require_once("connection.php");

    // Check for database connection errors
    $conn = new mysqli($servername, $username, $password, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform any necessary validation on the data before inserting it into the database

    // Update the tbldrugsdispensed table with the dispensed drug details
    $sql = "INSERT INTO tbldrugsdispensed (SSN, f_name, drug_name, drug_prize) VALUES ('$SSN', '$f_name', '$drug_name', '$drug_prize')";

    if ($conn->query($sql) === TRUE) {
        // The database update was successful
        echo "Success";
    } else {
        // An error occurred while updating the database
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    // Invalid or missing POST data
    echo "Invalid request.";
}
?>
