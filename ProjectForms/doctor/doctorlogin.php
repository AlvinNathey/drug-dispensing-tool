<?php
session_start();
if(isset($_SESSION['logging']) && $_SESSION['logging'] === true){

}
require_once("connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['doc_id'])  && isset($_POST['doc_fname']) && isset($_POST['doc_password'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
        $doc_id = validate($_POST['doc_id']);
        $doc_fname = validate($_POST['doc_fname']);
        $doc_password = validate($_POST['doc_password']);
        if(empty($doc_id)){
            header("Username is required");
            exit();
        }elseif(empty($doc_fname)){
            header("First name is required");
            exit();
        }elseif(empty($doc_password)){
            header("Password is required");
            exit();
        }else{
            $sql = "SELECT * FROM tbldoctors WHERE doc_id ='$doc_id' AND doc_fname = '$doc_fname' AND doc_password ='$doc_password'";
            $result = $conn->query($sql);
            if($result->num_rows === 1){
                $row = $result->fetch_assoc();
                if($row['doc_id']==$doc_id && $row['doc_fname'] == $doc_fname && $row['doc_password']==$doc_password){
                    session_start();
                    echo "Logged in";
                    $_SESSION['logging'] = true;
                    $_SESSION['doc_id'] = $row['doc_id'];
                    $_SESSION['doc_fname'] = $row['doc_fname'];
                    $_SESSION['doc_password'] = $row['doc_password'];
                    header("location: doctor/doctorloggedin.php");
                    exit();
                }else{
                    header("Incorrect username or password");
                }
            }
        }
    }
}

?>