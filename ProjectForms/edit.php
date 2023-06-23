
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <table>
        <tr>
            <th>SSN</th>
            <th>f_name</th>
            <th>l_name</th>
            <th>Phone_no</th>
            <th>Email</th>
            <th>P_password</th>
            <th>gender</th>
            <th>Age</th>
            <th>AssociateDoctor</th>
        </tr>

        <?php
        include("connection.php");
        error_reporting(0);
        $query ="select * from tblpatient";
        $data = mysqli_query($conn,$query);
        $total =mysqli_num_rows($data);
        if($total!=0)
        {
            while($result=mysqli_fetch_all($data))
            {
               echo"
            
               <td><a href='edit.php? SSN=$result[SSN]& fn =$result[f_name]& ln=$result[l_name]& ph=$result[Phone_no]& em=$result[Email]& pp=$result[P_password]& g=$result[gender]& age=$result[Age]& ad=$result[AssociateDoctor] 'onclick='return checkdelete()'>Edit</td>
           
            </tr>
            ";
            }
        }
        else{
            echo"No record found";
        }
        ?>

    </table>
</body>
</html>
<?php

?>
<?php
include("connection.php");
error_reporting(0);
$SSN =$_GET['SSN'];
$fn =$_GET['fn'];
$ln =$_GET['ln'];
$ph =$_GET['ph'];
$em =$_GET['em'];
$pp =$_GET['pp'];
$g =$_GET['g'];
$age =$_GET['age'];
$ad =$_GET['ad'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Patient Signup</title>

    </head>
    <body>
        <h1>Patient Registration</h1>
        <form method="post" action="patientsignup.php">
            <label for="SSN">SSN</label>
            <input type="text" name= "SSN" id="SSN" maxlength="10" required>
            <br>
            <br>
            <label for="f_name">First name</label>
            <input type="text" name="f_name" id="f_name" maxlength="20" required >
            <br>
            <br>
            <label for="l_name">Last name</label>
            <input type="text" name="l_name" id="l_name" maxlength="20" required >
            <br>
            <br>
            <label for="Phone_no">Phone Number</label>
            <input type="number" name= "Phone_no" id="Phone_no" maxlength="10" required >
            <br>
            <br>
            <label for="Email">Email</label>
            <input type="email" name= "Email" id="Email" maxlength="20" required >
            <br>
            <br>
            <label for="password">Password</label>
            <input type="password" name= "P_password"id="password" maxlength="20" required >
            <br>
            <br>
            <label for="Gender">Gender</label>
            <select id="gender" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <br>
            <br>
            <label for="age">Age</label>
            <input type="number" name= "Age" id="age"  maxlength="20"required >
            <br>
            <br>
            <label for="AssociateDoctor">Associate Doctor</label>
            <input type="text" name= "AssociateDoctor" id="AssociateDoctor" required >
            <br>
            <br>
            <input type="submit" value="Submit">
        </form>
    </body> 
</html>
