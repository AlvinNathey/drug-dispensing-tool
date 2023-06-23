<?php
include("connection.php");
error_reporting(0);

$SSN =$_GET['SSN'];
$f_name =$_GET['f_name'];
$l_name =$_GET['l_name'];
$Phone_no =$_GET['Phone_no'];
$Email =$_GET['Email'];
$P_password =$_GET['P_password'];
$Gender =$_GET['Gender'];
$Age =$_GET['Age'];
$AssociateDoctor =$_GET['AssociateDoctor'];
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
            <input type="text" name= "SSN" value="<?php echo"$SSN"?>" id="SSN" maxlength="10" required>
            <br>
            <br>
            <label for="f_name">First name</label>
            <input type="text" name="f_name"value="<?php echo"$f_name"?>" id="f_name" maxlength="20" required >
            <br>
            <br>
            <label for="l_name">Last name</label>
            <input type="text" name="l_name" value="<?php echo"$l_name"?>" id="l_name" maxlength="20" required >
            <br>
            <br>
            <label for="Phone_no">Phone Number</label>
            <input type="number" name= "Phone_no" value="<?php echo"$Phone_no"?>" id="Phone_no" maxlength="10" required >
            <br>
            <br>
            <label for="Email">Email</label>
            <input type="email" name= "Email" value="<?php echo"$Email"?>" id="Email" maxlength="20" required >
            <br>
            <br>
            <label for="password">Password</label>
            <input type="password" name= "P_password" value="<?php echo"$P_password"?>"id="password" maxlength="20" required >
            <br>
            <br>
            <label for="Gender">Gender</label>
            <select id="gender" value="<?php echo"Gender"?>" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <br>
            <br>
            <label for="age">Age</label>
            <input type="number" name= "Age" value="<?php echo"$Age"?>" id="age"  maxlength="20"required >
            <br>
            <br>
            <label for="AssociateDoctor">Associate Doctor</label>
            <input type="text" name= "AssociateDoctor"value="<?php echo"$AssociateDoctor"?>" id="AssociateDoctor" required >
            <br>
            <br>
            <input type="submit" value="Update">
        </form>
    </body> 
</html>
 <?php
 if($_GET['submit'])
 {
    $SSN=$_GET['SSN'];
    $f_name=$_GET['f_name'];
    $l_name=$_GET['l_name'];
    $Phone_no=$_GET['Phone_no'];
    $Email=$_GET['Email'];
    $P_password=$_GET['P_password'];
    $Gender=$_GET['Gender'];
    $Age=$_GET['Age'];
    $AssociateDoctor=$_GET['AssociateDoctor'];
   
    $query="UPDATE tblpatient SET SSN='$SSN', f_name='$f_name', l_name='$l_name', 
    Phone_no='$Phone_no', Email='$Email', P_password='$P_password',
     Gender='$Gender', Age='$Age', AssociateDoctor='$AssociateDoctor' WHERE SSN='$SSN'";
    
    $data=mysqli_query($conn,$query);
  
 } 
 ?>