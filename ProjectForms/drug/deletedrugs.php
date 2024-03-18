<?php 
require_once("connection.php");
if(isset ($_GET["drug_name"])){
    $drug_name = $_GET["drug_name"];

    require_once("connection.php");

    $sql = "DELETE  FROM tbldrugs WHERE drug_name ='$drug_name' ";

    $result= mysqli_query($conn, $sql);

}

header('location: viewdrugs.php');
exit;
?>