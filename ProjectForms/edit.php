<?php
include("connection.php");
error_reporting(0);

$SS =$_GET['SS'];
$f_name =$_GET['f_nam'];
$l_nam =$_GET['l_nam'];
$Phone_n =$_GET['Phone_n'];
$Emai =$_GET['Emai'];
$P_passwor =$_GET['P_passwor'];
$Gende =$_GET['Gende'];
$Ag =$_GET['Ag'];
$AssociateDocto =$_GET['AssociateDocto'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Patient Signup</title>

    </head>
    <body>
        <h1>Patient Editing</h1>
        <form method="post" action="patientsignup.php">
            <label for="SSN">SSN</label>
            <input type="text" name= "SSN" value="<?php echo"$SS"?>" id="SSN" maxlength="10" required>
            <br>
            <br>
            <label for="f_name">First name</label>
            <input type="text" name="f_name"value="<?php echo"$f_nam"?>" id="f_name" maxlength="20" required >
            <br>
            <br>
            <label for="l_name">Last name</label>
            <input type="text" name="l_name" value="<?php echo"$l_nam"?>" id="l_name" maxlength="20" required >
            <br>
            <br>
            <label for="Phone_no">Phone Number</label>
            <input type="number" name= "Phone_no" value="<?php echo"$Phone_n"?>" id="Phone_no" maxlength="10" required >
            <br>
            <br>
            <label for="Email">Email</label>
            <input type="email" name= "Email" value="<?php echo"$Emai"?>" id="Email" maxlength="20" required >
            <br>
            <br>
            <label for="password">Password</label>
            <input type="password" name= "P_password" value="<?php echo"$P_passwor"?>"id="password" maxlength="20" required >
            <br>
            <br>
            <label for="Gender">Gender</label>
            <select id="gender" value="<?php echo"$Gende"?>" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <br>
            <br>
            <label for="age">Age</label>
            <input type="number" name= "Age" value="<?php echo"$Ag"?>" id="age"  maxlength="20"required >
            <br>
            <br>
            <label for="AssociateDoctor">Associate Doctor</label>
            <input type="text" name= "AssociateDoctor"value="<?php echo"$AssociateDocto"?>" id="AssociateDoctor" required >
            <br>
            <br>
            <input type="submit" value="Update">
        </form>
    </body> 
</html>
 <?php
 if($_GET['submit'])
 {
    $SS=$_GET['SS'];
    $f_nam=$_GET['f_nam'];
    $l_nam=$_GET['l_nam'];
    $Phone_n=$_GET['Phone_n'];
    $Emai=$_GET['Emai'];
    $P_passwor=$_GET['P_passwor'];
    $Gende=$_GET['Gende'];
    $Ag=$_GET['Ag'];
    $AssociateDocto=$_GET['AssociateDocto'];
   
    $query="UPDATE tblpatient SET SS='$SSN', f_nam='$f_name', l_nam='$l_name', 
    Phone_n='$Phone_no', Emai='$Email', P_passwor='$P_password',
     Gende='$Gender', Ag='$Age', AssociateDocto='$AssociateDoctor' WHERE SS='$SSN'";
    
    $data=mysqli_query($conn,$query);
  
 } 
 ?>