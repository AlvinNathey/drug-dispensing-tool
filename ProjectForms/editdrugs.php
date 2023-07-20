<?php
require_once("connection.php");
$drug_name = "";
$drug_id = "";
$drug_quantity = "";
$drug_price = "";


 if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(!isset($_GET["drug_name"])){
        header("Location: viewdrugs.php");
    }

    $drug_name=$_GET["drug_name"];

    $sql="SELECT * FROM tbldrugs WHERE drug_name = '$drug_name' ";
    $result = mysqli_query($conn, $sql);
    $row=$result->fetch_assoc();
 
    if(!$row ){
         header("Location: viewdrugs.php");
         exit;
    }
    $drug_name = $row["drug_name"];
    $drug_id = $row["drug_id"];
    $drug_quantity = $row["drug_quantity"];
    $drug_price = $row["drug_price"];
    
 }elseif(isset($_POST['drug_name'])){
     
    $drug_name = $_POST["drug_name"];
    $drug_id = $_POST["drug_id"];
    $drug_quantity = $_POST["drug_quantity"];
    $drug_price = $_POST["drug_price"];

    
        if(empty($drug_name) || empty($drug_id) || empty($drug_quantity)|| empty($drug_price)){
            echo "All fields are required "; 
            
        }

        $sql="UPDATE tbldrugs SET drug_name ='$drug_name',drug_id ='$drug_id',drug_quantity='$drug_quantity',drug_price ='$drug_price' WHERE drug_name = $drug_name ";

        $result = mysqli_query($conn, $sql);

        header('Location: viewdrugs.php');

    

    
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit drugs</title>
    <link rel="stylesheet" type="text/css" href="decorate.css">
</head>
<body>

    <h1>Edit drugs</h1>
    <form method="post" action="">
        <label for="drug_name">Drug name</label>
            <input type="text" name= "drug_name" id="drug_name" maxlength="100" required value = "<?php echo $drug_name?>">
            <br>
            <br>
           <label for="drug_id">Drug ID</label>
            <input type="text" name="drug_id" id="drug_id" maxlength="20" required value = "<?php echo $drug_id?>">
            <br>
            <br>
            <label for="drug_quantity">Quantity</label>
            <input type="text" name="drug_quantity" id="drug_quantity" maxlength="20" required value = "<?php echo $drug_quantity?>">
            <br>
            <br>
            <label for="drug_price">Price per unit</label>
            <input type="number" name= "drug_price"id="drug_price" maxlength="20" required value = "<?php echo $drug_price?>">
            <br>
            <br>
            <input type="submit" value="Submit">
    </form>
</body>
</html>