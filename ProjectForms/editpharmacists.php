<?php
require_once("connection.php");
$pharmacist_id = "";
$pharmacist_fname = "";
$pharmacist_lname = "";
$pharm_password = "";


 if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(!isset($_GET["pharmacist_id"])){
        header("Location: viewpharmacists.php");
    }

    $pharmacist_id=$_GET["pharmacist_id"];

    $sql="SELECT * FROM tblpharmacists WHERE pharmacist_id= $pharmacist_id ";
    $result = mysqli_query($conn, $sql);
    $row=$result->fetch_assoc();
 
    if(!$row ){
         header("Location: viewpharmacists.php");
         exit;
    }
    $pharmacist_id = $row["pharmacist_id"];
    $pharmacist_fname = $row["pharmacist_fname"];
    $pharmacist_lname = $row["pharmacist_lname"];
    $pharm_password = $row["pharm_password"];
    
 }elseif(isset($_POST['pharmacist_id'])){
     
    $pharmacist_id = $_POST["pharmacist_id"];
    $pharmacist_fname = $_POST["pharmacist_fname"];
    $pharmacist_lname = $_POST["pharmacist_lname"];
    $pharm_password = $_POST["pharm_password"];

    
        if(empty($pharmacist_id) || empty($pharmacist_fname) || empty($pharmacist_lname)|| empty($pharm_password)){
            echo "All fields are required "; 
            
        }

        $sql="UPDATE tblpharmacists SET pharmacist_id='$pharmacist_id',pharmacist_fname ='$pharmacist_fname',pharmacist_lname='$pharmacist_lname',pharm_password ='$pharm_password' WHERE pharmacist_id =$pharmacist_id";

        $result = mysqli_query($conn, $sql);

        header('Location: viewpharmacists.php');

    

    
    } 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pharmacist edit</title>
    </head>
    <body>
        <form method="post" action="">
            <label for="pharmacist_id">ID</label>
            <input type="text" name="pharmacist_id" id="pharmacist_id" maxlength="10" required value="<?php echo $pharmacist_id?>" >
            <br>
            <br>
            <label for="pharmacist_fname">First Name</label>
            <input type="text" name= "pharmacist_fname" id="pharmacist_fname" maxlength="50" required value="<?php echo $pharmacist_fname?>">
            <br>
            <br>
            <label for="pharmacist_lname">Second Name</label>
            <input type="text" name= "pharmacist_lname" id="pharmacist_lname" maxlength="50" required value="<?php echo $pharmacist_lname?>">
            <br>
            <br>
            <label for="pharm_password">Password</label>
            <input type="password" name="pharm_password" id="pharm_password" maxlength="20" required value="<?php echo $pharm_password?>">
            <br>
            <br>
            <input type="submit" value="edit">
        </form>
    </body> 
    </html>