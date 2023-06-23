<?php 
require_once("connection.php");
if(isset ($_GET['SSN'])){
    $SSN = $_GET['SSN'];
    $sql = "DELETE * FROM tblpatients WHERE SSN ='$SSN' ";
    $conn -> query($sql);

}
header('location: deleted.php');
exit;
?>