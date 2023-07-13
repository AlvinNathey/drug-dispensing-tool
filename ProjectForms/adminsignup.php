<?php 

echo "We're here in the next page.\n";

require_once("connection.php");
    $admin_id = $_POST["admin_id"];
    $admin_fname = $_POST["admin_fname"];
    $admin_lname = $_POST["admin_lname"];
    $admin_password = $_POST["admin_password"];
    

$sql = "INSERT INTO tbladmin (admin_id, admin_fname, admin_lname,admin_password)
VALUES ('$admin_id','$admin_fname', '$admin_lname','$admin_password')";

if($conn->query($sql) === TRUE) {
    echo 
    "<script>alert('Data inserted successfully')</script>";
}else {
    echo "Error: ".$sql."<br>".$conn->error;
}
//adminsignup
$conn->close();
?>