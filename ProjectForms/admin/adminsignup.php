<?php 
echo "We're here in the next page.\n";

require_once("connection.php");

// Check if all required fields are set
if(isset($_POST["admin_id"], $_POST["admin_fname"], $_POST["admin_lname"], $_POST["admin_email"], $_POST["admin_password"])) {
    // Retrieve data from the form
    $admin_id = $_POST["admin_id"];
    $admin_fname = $_POST["admin_fname"];
    $admin_lname = $_POST["admin_lname"];
    $admin_email = $_POST["admin_email"];
    $admin_password = $_POST["admin_password"];
    
    // Insert data into the database
    $sql = "INSERT INTO tbladmin (admin_id, admin_fname, admin_lname, admin_email, admin_password)
            VALUES ('$admin_id', '$admin_fname', '$admin_lname', '$admin_email', '$admin_password')";
    
    if($conn->query($sql) === TRUE) {
        // Display success message using JavaScript alert
        echo "<script>alert('Data inserted successfully')</script>";
    } else {
        // Display error message if insertion fails
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Handle case where required fields are not set
    echo "Error: Required fields are not set.";
}

// Redirect to the admin login page
header("location: ../admin/adminlogin.html");

// Close the database connection
$conn->close();
?>
