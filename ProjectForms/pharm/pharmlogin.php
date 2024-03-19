<?php
session_start();
if(isset($_SESSION['logging']) && $_SESSION['logging'] === true){

}
require_once("connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['pharmacist_id'])  && isset($_POST['pharmacist_fname']) && isset($_POST['pharm_password'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
        $pharmacist_id = validate($_POST['pharmacist_id']);
        $pharmacist_fname = validate($_POST['pharmacist_fname']);
        $pharm_password = validate($_POST['pharm_password']);
        if(empty($pharmacist_id)){
            header("Username is required");
            exit();
        }elseif(empty($pharmacist_fname)){
            header("First name is required");
            exit();
        }elseif(empty($pharm_password)){
            header("Password is required");
            exit();
        }else{
            $sql = "SELECT * FROM tblpharmacists WHERE pharmacist_id ='$pharmacist_id' AND pharmacist_fname = '$pharmacist_fname' AND pharm_password ='$pharm_password'";
            $result = $conn->query($sql);
            if($result->num_rows === 1){
                $row = $result->fetch_assoc();
                if($row['pharmacist_id']==$pharmacist_id && $row['pharmacist_fname'] == $pharmacist_fname && $row['pharm_password']==$pharm_password){
                    session_start();
                    echo "Logged in";
                    $_SESSION['logging'] = true;
                    $_SESSION['pharmacist_id'] = $row['pharmacist_id'];
                    $_SESSION['pharmacist_fname'] = $row['pharmacist_fname'];
                    $_SESSION['pharm_password'] = $row['pharm_password'];
                    header("location: pharmloggedin.php");
                    exit();
                }else{
                    header("Incorrect username or password");
                }
            }
        }
    }
}

?>