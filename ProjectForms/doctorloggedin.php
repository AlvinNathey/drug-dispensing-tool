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
    <h3>Welcome Dr, <?php echo $_SESSION["doc_fname"] ; ?></h3>
        </div>
    </body>
    </html>

<?php
}else{
    header("Location: doctorlogin.html");
}
?>
