<?php 
require_once("connection.php");

$drug_name = $_POST["drug_name"];
$drug_id = $_POST["drug_id"];
$drug_quantity = $_POST["drug_quantity"];
$drug_price = $_POST["drug_price"];
$drug_category = $_POST["drug_category"];
$drug_photo = $_POST["drug_photo"];

$sql = "INSERT INTO tbldrugs (drug_name, drug_id, drug_quantity, drug_price, drug_category, drug_photo)
        VALUES ('$drug_name', '$drug_id', '$drug_quantity', '$drug_price', '$drug_category', '$drug_photo')";

if ($conn->query($sql) === TRUE) {
    // Redirect back to pharmacistloggedin.php
    header("Location: pharmloggedin.php");
    exit; // Ensure no further code execution after the redirect
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
