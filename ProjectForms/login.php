<?php
session_start();
if(isset($_SESSION['logging']) && $_SESSION['logging'] === true){

}
require_once("connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['SSN'])  && isset($_POST['f_name']) && isset($_POST['P_password'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
        $SSN = validate($_POST['SSN']);
        $f_name = validate($_POST['f_name']);
        $P_password = validate($_POST['P_password']);
        if(empty($SSN)){
            header("Username is required");
            exit();
        }elseif(empty($f_name)){
            header("First name is required");
            exit();
        }elseif(empty($P_password)){
            header("Password is required");
            exit();
        }else{
            $sql = "SELECT * FROM tblpatient WHERE SSN ='$SSN' AND f_name = '$f_name' AND P_password ='$P_password'";
            $result = $conn->query($sql);
            if($result->num_rows === 1){
                $row = $result->fetch_assoc();
                if($row['SSN']==$SSN && $row['f_name'] == $f_name && $row['P_password']==$P_password){
                    session_start();
                    echo "Logged in";
                    $_SESSION['logging'] = true;
                    $_SESSION['SSN'] = $row['SSN'];
                    $_SESSION['f_name'] = $row['f_name'];
                    $_SESSION['P_password'] = $row['P_password'];
                    header("location: loggedin.php");
                    exit();
                }else{
                    header("Incorrect username or password");
                }
            }
        }
    }
}

?>