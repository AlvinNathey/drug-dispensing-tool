<?php 
require_once("connection.php");
if(isset ($_GET["doc_id"])){
    $doc_id = $_GET["doc_id"];

    require_once("connection.php");

    $sql = "DELETE  FROM tbldoctors WHERE doc_id ='$doc_id' ";

    $result= mysqli_query($conn, $sql);

}

header('location: viewdoctors.php');
exit;
?>