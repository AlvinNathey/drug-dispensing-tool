<?php
session_start();
if(isset($_SESSION['logging']) && $_SESSION['logging'] === true){

}
require_once("connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['admin_id'])  && isset($_POST['admin_fname']) && isset($_POST['admin_password'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
        $doc_id = validate($_POST['admin_id']);
        $doc_fname = validate($_POST['admin_fname']);
        $doc_password = validate($_POST['admin_password']);
        if(empty($admin_id)){
            header("Username is required");
            exit();
        }elseif(empty($admin_fname)){
            header("First name is required");
            exit();
        }elseif(empty($admin_password)){
            header("Password is required");
            exit();
        }else{
            $sql = "SELECT * FROM tbladmin WHERE admin_id ='$admin_id' AND admin_fname = '$admin_fname' AND admin_password ='$admin_password'";
            $result = $conn->query($sql);
            if($result->num_rows === 1){
                $row = $result->fetch_assoc();
                if($row['doc_id']==$doc_id && $row['doc_fname'] == $doc_fname && $row['doc_password']==$doc_password){
                    session_start();
                    echo "Logged in";
                    $_SESSION['logging'] = true;
                    $_SESSION['admin_id'] = $row['admin_id'];
                    $_SESSION['admin_fname'] = $row['admin_fname'];
                    $_SESSION['admin_password'] = $row['admin_password'];
                    header("location: adminloggedin.php");
                    exit();
                }else{
                    header("Incorrect username or password");
                }
            }
        }
    }
}

?>