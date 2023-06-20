<?php 

echo "We're here in the next page.\n";
require_once("./connection.php");


    $pharmacist_id = $_POST["pharmacist_id"];
    $pharmacist_fname = $_POST["pharmacist_fname"];
    $pharmacist_lname = $_POST["pharmacist_lname"];
    $pharm_password = $_POST["pharm_password"];
       

$sql = "INSERT INTO tblpharmacist (pharmacist_id, pharmacist_fname, pharmacist_lname, pharm_password) 
VALUES ('$pharmacist_id','$pharmacist_fname', '$pharmacist_lname','$pharm_password')";

if($conn->query($sql) === TRUE) {
    echo 
    "<script>alert('Data inserted successfully')</script>";
}else {
    echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();
?>