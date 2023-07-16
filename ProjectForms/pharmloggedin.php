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
    <h3>Welcome Pharmacist, <?php echo $_SESSION["pharmacist_fname"] ; ?></h3>
        </div>
        <h2>What do you want to do?<h2>
        <input type="submit" value="Input Drugs" class="inputDrugs" onclick="redirectToDrugsView()">
         <script>
           function redirectToDrugsView() {
             window.location.href = "inputdrugs.html";}
         </script>
    </body>
    </html>

<?php
}else{
    header("Location: pharmlogin.html");
}
?>
