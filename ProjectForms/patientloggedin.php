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
    <h3>Welcome, <?php echo $_SESSION["f_name"] ; ?></h3>
        </div>
    </body>
    </html>

<?php
}else{
    header("Location: patientlogin.html");
}
?>
