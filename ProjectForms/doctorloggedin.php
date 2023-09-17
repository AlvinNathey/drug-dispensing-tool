<?php
session_start();

if(isset($_SESSION['logging'])){

?>
    
    <!DOCTYPE html>
<html>
<head>
    <title>Logged In Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: deepskyblue;
            margin: 0;
            padding: 0;
        }

        /* Header Styles */
       
          .welcome {
            position: absolute;
            top: 0;
            right: 0;

            color: #ffffff;
            padding: 5px;
        
        }

        /* Content Styles */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: mediumturquoise;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        /* Form Styles */
        form {
          background-color: mediumturquoise;
            text-align: center; /* Center-align form elements */
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            text-align: left; /* Align labels to the left */
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="welcome">
        <h3>Welcome Dr, <?php echo $_SESSION["doc_fname"] ; ?></h3>
    </div>
    <div class="container">
        <h2>Write Patient's Prescription</h2>
        <h3>Enter the Patient's SSN</h3>
        <form method="post" action="insertprescription.php">
            <label for="SSN">SSN</label>
            <input type="text" name="SSN" id="SSN" maxlength="10" required>
            <br>
            <h3>Enter the Patient's First Name</h3>
            <label for="f_name">First name</label>
            <input type="text" name="f_name" id="f_name" maxlength="20" required>
            <br><br>
            <label for="diagnosis">Diagnosis:</label>
            <textarea id="diagnosis" name="diagnosis" required></textarea><br>
            <br><br>
            <label for="drug_name">Drug name:</label>
            <textarea id="drug_name" name="drug_name" required></textarea><br>
            <br><br>
            <label for="drug_prize">Drug prize:</label>
            <textarea id="drug_prize" name="drug_prize" required></textarea><br>
            <br><br>
            <label for="dosage">Dosage:</label>
            <textarea id="dosage" name="dosage" required></textarea><br>
            <br><br>
            <input type="submit" value="Submit Prescription">
        </form>
    </div>
  <!-- Logout button -->
<a href="doctorlogout.php" style="display: block; background-color: #007bff; color: #fff; padding: 10px 20px; text-decoration: none; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; position: relative; bottom: 0; left: 0;">Logout</a>

</body>
</html>

<?php
}else{
    header("Location: doctorlogin.html");
}
?>
