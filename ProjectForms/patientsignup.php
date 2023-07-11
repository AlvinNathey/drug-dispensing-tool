<?php 

echo "We're here in the next page.\n";
require_once("connection.php");

    $SSN = $_POST["SSN"];
    $f_name = $_POST["f_name"];
    $l_name = $_POST["l_name"];
    $Phone_no = $_POST["Phone_no"];
    $Email = $_POST["Email"];
    $P_password = $_POST["P_password"];
    $Gender = $_POST["gender"];
    $Age = $_POST["Age"];
    $AssociateDoctor = $_POST["AssociateDoctor"];

$sql = "INSERT INTO tblpatients (SSN, f_name, l_name, Phone_no, Email, P_password, Gender, Age, AssociateDoctor)
VALUES ('$SSN','$f_name', '$l_name','$Phone_no','$Email','$P_password','$Gender','$Age','$AssociateDoctor')";

if($conn->query($sql) === TRUE) {
    echo 
    "<script>alert('Data inserted successfully')</script>";
}else {
    echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();
?>