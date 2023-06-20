<?php
session_start();

if(isset($_SESSION['logging'])){

?>
    
    <!DOCTYPE html>
    <html>
    <head>
    <title>Admin Page</title>
    </head>
    <body>
    <h2>Welcome, <?php echo $_SESSION["f_name"] ; ?></h2>
    </body>
    </html>

<?php
}else{
    header("Location: login.html");
}
?>
