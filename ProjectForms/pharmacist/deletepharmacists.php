<?php 
require_once("connection.php");
if(isset ($_GET["pharmacist_id"])){
    $pharmacist_id = $_GET["pharmacist_id"];

    require_once("connection.php");

    $sql = "DELETE  FROM tblpharmacists WHERE pharmacist_id ='$pharmacist_id' ";

    $result= mysqli_query($conn, $sql);

}

header('location: viewpharmacists.php');
exit;
?>