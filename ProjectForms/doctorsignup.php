<?php 

echo "We're here in the next page.\n";

require_once("./connection.php");
    $doc_id = $_POST["doc_id"];
    $doc_fname = $_POST["doc_fname"];
    $doc_lname = $_POST["doc_lname"];
    $doc_password = $_POST["doc_password"];
    

$sql = "INSERT INTO tbldoctors (doc_id,doc_fname, doc_lname,doc_password)
VALUES ('$doc_id','$doc_fname', '$doc_lname','$doc_password')";

if($conn->query($sql) === TRUE) {
    echo 
    "<script>alert('Data inserted successfully')</script>";
}else {
    echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();
?>