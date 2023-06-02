<?php 

echo "We're here in the next page";
require_once("./connect.php");

    $SSN = $_POST["SSN"];
    $Name = $_POST["Name"];
    $Phone_no = $_POST["Phone_no"];
    $Email = $_POST["Email"];
    $P_password = $_POST["P_password"];
    $Gender = $_POST["Gender"];
    $Age = $_POST["Age"];
    $AssociateDoctor = $_POST["AssociateDoctor"];

$sql = "INSERT INTO tblpatients (SSN, Name, Phone_no, Email, P_password, Gender, Age, AssociateDoctor)
VALUES ('$SSN','$Name','$Phone_no','$Email','$P_password','$Gender','$Age','$AssociateDoctor')";

if($conn->query($sql) === TRUE) {
    echo 
    "<script>alert('Data inserted successfully')</script>";
}else {
    echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();
?>