<?php 
require_once("connection.php");
if(isset ($_GET["SSN"])){
    $SSN = $_GET["SSN"];

    require_once("connection.php");

    $sql = "DELETE  FROM tblpatients WHERE SSN ='$SSN' ";

    $result= mysqli_query($conn, $sql);

}

header('location: viewpatients.php');
exit;
?>