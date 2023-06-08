<?php 

echo "We're here in the next page.\n";

require_once("./connection.php");
    $doctor_id=$_POST["doctor_id"];
    $f_name = $_POST["f_name"];
    $l_name = $_POST["l_name"];
    $p_password = $_POST["p_password"];
    

$sql = "INSERT INTO tbldoctors (doctor_id,f_name, l_name,p_password)
VALUES ('$doctor_id','$f_name', '$l_name','$p_password')";

if($conn->query($sql) === TRUE) {
    echo 
    "<script>alert('Data inserted successfully')</script>";
}else {
    echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();
?>