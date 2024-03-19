<?php
session_start();

// Redirect if the doctor is already logged in
if(isset($_SESSION['logging']) && $_SESSION['logging'] === true){
    header("Location: doctor/doctorloggedin.php");
    exit();
}

require_once("../connection.php");

// Check if the form is submitted via POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate and retrieve form data
    if(isset($_POST['doc_id']) && isset($_POST['doc_fname']) && isset($_POST['doc_password'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
        $doc_id = validate($_POST['doc_id']);
        $doc_fname = validate($_POST['doc_fname']);
        $doc_password = validate($_POST['doc_password']);
        
        // Check for empty fields
        if(empty($doc_id) || empty($doc_fname) || empty($doc_password)){
            header("Location: ../doctor/doctorlogin.html"); // Redirect to login page
            exit();
        }else{
            // Prepare and execute SQL query to validate credentials
            $sql = "SELECT * FROM tbldoctors WHERE doc_id ='$doc_id' AND doc_fname = '$doc_fname' AND doc_password ='$doc_password'";
            $result = $conn->query($sql);

            if($result->num_rows === 1){
                $row = $result->fetch_assoc();
                
                // Start a new session
                session_start();

                // Set session variables
                $_SESSION['logging'] = true;
                $_SESSION['doc_id'] = $row['doc_id'];
                $_SESSION['doc_fname'] = $row['doc_fname'];
                $_SESSION['doc_password'] = $row['doc_password'];

                // Redirect to logged-in page
                header("Location: doctor/doctorloggedin.php");
                exit();
            }else{
                header("Location: ../doctor/doctorlogin.html"); // Redirect to login page
                exit();
            }
        }
    }
}
?>
