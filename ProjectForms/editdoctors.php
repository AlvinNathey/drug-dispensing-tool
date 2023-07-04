<?php
require_once("connection.php");
$doc_id = "";
$doc_fname = "";
$doc_lname = "";
$doc_password = "";


 if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(!isset($_GET["doc_id"])){
        header("Location: viewdoctors.php");
    }

    $doc_id=$_GET["doc_id"];

    $sql="SELECT * FROM tbldoctors WHERE doc_id= $doc_id ";
    $result = mysqli_query($conn, $sql);
    $row=$result->fetch_assoc();
 
    if(!$row ){
         header("Location: viewdoctors.php");
         exit;
    }
    $doc_id = $row["doc_id"];
    $doc_fname = $row["doc_fname"];
    $doc_lname = $row["doc_lname"];
    $doc_password = $row["doc_password"];
    
 }elseif(isset($_POST['doc_id'])){
     
    $doc_id = $_POST["doc_id"];
    $doc_fname = $_POST["doc_fname"];
    $doc_lname = $_POST["doc_lname"];
    $doc_password = $_POST["doc_password"];

    
        if(empty($doc_id) || empty($doc_fname) || empty($doc_lname)|| empty($doc_password)){
            echo "All fields are required "; 
            
        }

        $sql="UPDATE tbldoctors SET doc_id='$doc_id',doc_fname ='$doc_fname',doc_lname='$doc_lname',doc_password ='$doc_password' WHERE doc_id =$doc_id";

        $result = mysqli_query($conn, $sql);

        header('Location: viewdoctors.php');

    

    
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor login</title>
</head>
<body>

    <h1>Doctor Signup</h1>
    <form method="post" action="">
        <label for="doc_id">Doctor id</label>
            <input type="text" name= "doc_id" id="doc_id" maxlength="5" required value="<?php echo $doc_id?>">
            <br>
            <br>
           <label for="doc_fname">First name</label>
            <input type="text" name="doc_fname" id="doc_fname" maxlength="20" required value="<?php echo $doc_fname?>" >
            <br>
            <br>
            <label for="doc_lname">Last name</label>
            <input type="text" name="doc_lname" id="doc_lname" maxlength="20" required value="<?php echo $doc_lname?>">
            <br>
            <br>
            <label for="doc_password">Password</label>
            <input type="password" name= "doc_password"id="doc_password" maxlength="20" required value="<?php echo $doc_password?>">
            <br>
            <br>
            <input type="submit" value="edit">
    </form>
</body>
</html>