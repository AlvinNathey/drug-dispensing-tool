<?php
require_once("../connection.php");
$doc_id = "";
$doc_fname = "";
$doc_lname = "";
$doc_password = "";


 if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(!isset($_GET["doc_id"])){
        header("Location: ../doctor/viewdoctors.php");
    }

    $doc_id=$_GET["doc_id"];

    $sql="SELECT * FROM tbldoctors WHERE doc_id= $doc_id ";
    $result = mysqli_query($conn, $sql);
    $row=$result->fetch_assoc();
 
    if(!$row ){
         header("Location: ../doctor/viewdoctors.php");
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

        header('Location: ../doctor/viewdoctors.php');

    

    
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Edit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: peachpuff;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Edit Doctor Information</h1>
    <form method="post" action="">
        <label for="doc_id">Doctor ID</label>
        <input type="text" name="doc_id" id="doc_id" maxlength="5" required value="<?php echo $doc_id ?>">
        <br><br>
        <label for="doc_fname">First Name</label>
        <input type="text" name="doc_fname" id="doc_fname" maxlength="20" required value="<?php echo $doc_fname ?>">
        <br><br>
        <label for="doc_lname">Last Name</label>
        <input type="text" name="doc_lname" id="doc_lname" maxlength="20" required value="<?php echo $doc_lname ?>">
        <br><br>
        <label for="doc_password">Password</label>
        <input type="password" name="doc_password" id="doc_password" maxlength="20" required value="<?php echo $doc_password ?>">
        <br><br>
        <input type="submit" value="Edit">
    </form>
    </body>
</html>
