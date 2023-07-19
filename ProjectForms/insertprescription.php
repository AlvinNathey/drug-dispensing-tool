<?php 

echo "prescription registered.\n";

require_once("connection.php");
    $SSN = $_POST["SSN"];
    $f_name = $_POST["f_name"];
    $diagnosis = $_POST["diagnosis"];
    $drug_name = $_POST["drug_name"];
    $drug_prize = $_POST["drug_prize"];
    $dosage = $_POST["dosage"];
    

$sql = "INSERT INTO tblprescriptions (SSN, f_name, diagnosis, drug_name, drug_prize, dosage)
VALUES ('$SSN','$f_name', '$diagnosis','$drug_name','$drug_prize ' '$dosage')";

if($conn->query($sql) === TRUE) {
    echo 
    "<script>alert('Data inserted successfully')</script>";
}else {
    echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();
header('Location: doctorloggedin.php');
?>