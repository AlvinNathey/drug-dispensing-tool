<?php
session_start();

if(isset($_SESSION['logging'])){

?>
    
    <!DOCTYPE html>
    <html>
    <head>
         <style>
    .welcome {
      position: absolute;
      top: 0;
      right: 0;
    }
  </style>
    <title>logged in page</title>
    <link rel="stylesheet" type="text/css" href="doctorpage.css">
    </head>
    <body>
       <div class="welcome">
    <h3>Welcome Dr, <?php echo $_SESSION["doc_fname"] ; ?></h3>
        </div>
       <h2> Write patient's prescripton <h2>
       <h3> Enter the patient's SSN <h3>
       <form method="post" action="insertprescription.php">
            <label for="SSN">SSN</label>
            <input type="text" name= "SSN" id="SSN" maxlength="10" required>
            <br>
           <h3> Enter the patient's First name<h3>
           <label for="f_name">First name</label>
            <input type="text" name="f_name" id="f_name" maxlength="20" required >
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
    </body>
    </html>

<?php
}else{
    header("Location: doctorlogin.html");
}
?>
