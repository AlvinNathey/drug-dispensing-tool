<?php
echo "We're here in the next page.\n";

// Include the connection file
require_once("../connection.php");

// Retrieve form data
$doc_id = $_POST["doc_id"];
$doc_fname = $_POST["doc_fname"];
$doc_lname = $_POST["doc_lname"];
$doc_password = $_POST["doc_password"];

// Prepare SQL query for insertion
$sql = "INSERT INTO tbldoctors (doc_id, doc_fname, doc_lname, doc_password)
        VALUES ('$doc_id', '$doc_fname', '$doc_lname', '$doc_password')";

// Execute the SQL query
if($conn->query($sql) === TRUE) {
    // Display success message
    echo "<script>alert('Data inserted successfully')</script>";
} else {
    // Display error message
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Redirect to doctor login page
header("location: ../doctor/doctorlogin.html");

// Close the database connection
$conn->close();
?>

