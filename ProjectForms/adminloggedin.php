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
    </head>
    <body>
       <div class="welcome">
    <h3>Welcome Admin, <?php echo $_SESSION["admin_fname"] ; ?></h3>
    <br><br>
        </div>
        <h2>How's information do you want to view<h2>
        <input type="submit" value="Doctor" class="doctorbutton" onclick="redirectToDoctorView()">
         <script>
           function redirectToDoctorView() {
             window.location.href = "viewdoctors.php";}
         </script>
         
         <input type="submit" value="Patient" class="patientbutton" onclick="redirectToAdminView()">
         <script>
           function redirectToAdminView() {
             window.location.href = "viewpatients.php";
           }
         </script>
         
         <input type="submit" value="Pharmacist" class="pharmbutton" onclick="redirectToPharmacistView()">
         <script>
           function redirectToPharmacistView() {
             window.location.href = "viewpharmacists.php";
           }
         </script> 
    </body>
    </html>

<?php
}else{
    header("Location: adminlogin.html");
}
?>
