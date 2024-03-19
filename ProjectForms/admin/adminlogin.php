<?php
session_start();
require_once("../connection.php");

if(isset($_SESSION['logging']) && $_SESSION['logging'] === true){
    header("Location: ../admin/adminloggedin.php");
    exit();
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['admin_id']) && isset($_POST['admin_fname']) && isset($_POST['admin_password'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
        $admin_id = validate($_POST['admin_id']);
        $admin_fname = validate($_POST['admin_fname']);
        $admin_password = validate($_POST['admin_password']);
        
        if(empty($admin_id) || empty($admin_fname) || empty($admin_password)){
            header("Location: adminlogin.html?error=emptyfields");
            exit();
        } else {
            $sql = "SELECT * FROM tbladmin WHERE admin_id ='$admin_id' AND admin_fname = '$admin_fname' AND admin_password ='$admin_password'";
            $result = $conn->query($sql);
            if($result->num_rows === 1){
                $row = $result->fetch_assoc();
                if($row['admin_id']==$admin_id && $row['admin_fname'] == $admin_fname && $row['admin_password']==$admin_password){
                    $_SESSION['logging'] = true;
                    $_SESSION['admin_id'] = $row['admin_id'];
                    $_SESSION['admin_fname'] = $row['admin_fname'];
                    $_SESSION['admin_password'] = $row['admin_password'];
                    header("Location: ../admin/adminloggedin.php");
                    exit();
                } else {
                    header("Location: ../admin/adminlogin.html?error=incorrectlogin");
                    exit();
                }
            } else {
                header("Location: adminlogin.html?error=nouser");
                exit();
            }
        }
    } else {
        header("Location: adminlogin.html");
        exit();
    }
}
?>
