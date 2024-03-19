<?php 
require_once("../connection.php");

// Check if doc_id is set in the GET parameters
if(isset($_GET["doc_id"])){
    // Sanitize the doc_id parameter to prevent SQL injection
    $doc_id = mysqli_real_escape_string($conn, $_GET["doc_id"]);

    // Construct the SQL query to delete the doctor entry
    $sql = "DELETE FROM tbldoctors WHERE doc_id ='$doc_id'";

    // Execute the query
    if(mysqli_query($conn, $sql)) {
        // Redirect to the view doctors page after successful deletion
        header('location: ../doctor/viewdoctors.php');
        exit; // Stop further execution of the script
    } else {
        // Handle the case where deletion fails
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    // Handle the case where doc_id is not set
    echo "Error: doc_id parameter is not set.";
}
?>
