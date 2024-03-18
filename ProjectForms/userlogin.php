?<?php 
/*
require_once("connection.php");
session_start();
//should clear all previous session data *to be done
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
     
    $username = validate($_POST["username"]);
    $password = validate($_POST["password"]);

    if (empty($username)) {
        echo 
        "<script>alert('Username required')</script>";
	    exit();
	}else if(empty($password)){
        echo 
            "<script>alert('Password required')</script>";
	    exit();
	}else{
    $sql = "SELECT * FROM tblusers WHERE username='$username' AND password='$password'";

    $result = mysqli_query($conn, $sql);
        
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['usertype'] = $row['usertype'];
        if ($row['username'] === $username && $row['password'] === $password) {
            $usertype = $row['Usertype'];
            $_SESSION['loggedin']=true;
            if($usertype == "patient"){
                $sql = "SELECT * FROM tblpatients WHERE f_name='$f_name'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
               
                header("Location: dashboards/patientloggedin.php");
            }
            if($usertype == "doctor"){
                $sql = "SELECT * FROM tbldoctors WHERE Username='$username'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $_SESSION['Names'] = $row['Names'];
                $_SESSION['SSN'] = $row['SSN'];
                $_SESSION['Username'] = $row['Username'];
                $_SESSION['sccmmsg']="Doctor logged in successfully";
                header("Location: dashboards/doctor_dashboard.php");
            }
            if($usertype == "pharmacist"){
                $sql = "SELECT * FROM tblpharmacists WHERE Username='$username'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $_SESSION['Names'] = $row['Names'];
                $_SESSION['SSN'] = $row['SSN'];
                $_SESSION['Username'] = $row['Username'];
                $_SESSION['sccmmsg']="Pharmacist logged in successfully";
                header("Location: dashboards/pharmacist_dashboard.php");
            }
            if($usertype == "admin"){
                $sql = "SELECT * FROM tbladmin WHERE Username='$username'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $_SESSION['Names'] = $row['Names'];
                $_SESSION['SSN'] = $row['SSN'];
                $_SESSION['Username'] = $row['Username'];
                $_SESSION['sccmmsg']="Supervisor logged in successfully";
                header("Location: dashboards/supervisor_dashboard.php");
            }
            if($usertype == "admin"){
                $sql = "SELECT * FROM tbladmins WHERE Username='$username'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $_SESSION['Username'] = $row['Username'];
                $_SESSION['Names'] = $row['Names'];
                $_SESSION['sccmmsg']="Administrator logged in successfully";
                header("Location: dashboards/admin_dashboard.php");
            }

            //header("Location: home.php");
            //exit();
        }else{
         
            header("Location: userlogin.html?error=Incorrect username or password");
            exit();

            
        }
    }else{
        header("Location: userlogin.html?error=Incorrect username or password");
        exit();
        
        
    }
}
}
*/
?>