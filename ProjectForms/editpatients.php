<?php
require_once("connection.php");
$SSN = "";
$f_name = "";
$l_name = "";
$Phone_no = "";
$Email = "";
$P_password = ""; 
$Gender = "";
$Age = "";
$AssociateDoctor = "";

 if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(!isset($_GET["SSN"])){
        header("Location: viewpatients.php");
    }

    $SSN=$_GET["SSN"];

    $sql="SELECT * FROM tblpatients WHERE SSN= $SSN ";
    $result = mysqli_query($conn, $sql);
    $row=$result->fetch_assoc();
 
    if(!$row ){
         header("Location: viewpatients.php");
         exit;
    }
    $SSN = $row["SSN"];
    $f_name = $row["f_name"];
    $l_name = $row["l_name"];
    $Phone_no = $row["Phone_no"];
    $Email = $row["Email"];
    $P_password = $row["P_password"];
    $Gender = $row["Gender"];
    $Age = $row["Age"];
    $AssociateDoctor = $row["AssociateDoctor"];

 }elseif(isset($_POST['SSN'])){
     
    $SSN = $_POST["SSN"];
    $f_name = $_POST["f_name"];
    $l_name = $_POST["l_name"];
    $Phone_no = $_POST["Phone_no"];
    $Email = $_POST["Email"];
    $P_password = $_POST["P_password"];
    $Gender = $_POST["Gender"];
    $Age = $_POST["Age"];
    $AssociateDoctor = $_POST["AssociateDoctor"];

    
        if(empty($SSN) || empty($f_name) || empty($l_name)|| empty($Phone_no)|| empty($Email)|| empty($P_password)|| empty($Gender)|| empty($Age)|| empty($AssociateDoctor)){
            echo "All fields are required "; 
            
        }

        $sql="UPDATE tblpatients SET SSN='$SSN',f_name ='$f_name',l_name='$l_name',Phone_no ='$Phone_no',Email='$Email',P_password='$P_password', Gender='$Gender', Age='$Age', AssociateDoctor='$AssociateDoctor' WHERE SSN=$SSN";

        $result = mysqli_query($conn, $sql);

        header('Location: viewpatients.php');

    

    
    } 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Patient Edit</title>
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
        input[type="number"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: url('down-arrow.png') no-repeat right;
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
    <h1>Edit Patient Information</h1>
    <form action="" method="post">
        <label for="SSN">SSN</label>
        <input type="number" name="SSN" id="SSN" maxlength="10" required value="<?php echo $SSN ?>">
        <br><br>
        <label for="f_name">First Name</label>
        <input type="text" name="f_name" id="f_name" maxlength="20" required value="<?php echo $f_name ?>">
        <br><br>
        <label for="l_name">Last Name</label>
        <input type="text" name="l_name" id="l_name" maxlength="20" required value="<?php echo $l_name ?>">
        <br><br>
        <label for="Phone_no">Phone Number</label>
        <input type="number" name="Phone_no" id="Phone_no" maxlength="10" required value="<?php echo $Phone_no ?>">
        <br><br>
        <label for="Email">Email</label>
        <input type="email" name="Email" id="Email" maxlength="20" required value="<?php echo $Email ?>">
        <br><br>
        <label for="P_password">Password</label>
        <input type="password" name="P_password" id="P_password" maxlength="20" required value="<?php echo $P_password ?>">
        <br><br>
        <label for="Gender">Gender</label>
        <select id="Gender" name="Gender" required>
            <option value="male" <?php echo ($Gender === 'male') ? 'selected' : ''; ?>>Male</option>
            <option value="female" <?php echo ($Gender === 'female') ? 'selected' : ''; ?>>Female</option>
        </select>
        <br><br>
        <label for="Age">Age</label>
        <input type="number" name="Age" id="Age" maxlength="20" required value="<?php echo $Age ?>">
        <br><br>
        <label for="AssociateDoctor">Associate Doctor</label>
        <input type="text" name="AssociateDoctor" id="AssociateDoctor" required value="<?php echo $AssociateDoctor ?>">
        <br><br>
        <input type="submit" value="Edit">
    </form>
    
</body>
</html>
