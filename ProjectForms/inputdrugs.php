<?php 

echo "Drug registered.\n";

require_once("connection.php");
    $drug_name = $_POST["drug_name"];
    $drug_id = $_POST["drug_id"];
    $drug_quantity = $_POST["drug_quantity"];
    $drug_price = $_POST["drug_price"];
    

$sql = "INSERT INTO tbldrugs (drug_name,drug_id, drug_quantity,drug_price)
VALUES ('$drug_name','$drug_id', '$drug_quantity','$drug_price')";

if($conn->query($sql) === TRUE) {
    echo 
    "<script>alert('Data inserted successfully')</script>";
}else {
    echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();
?>