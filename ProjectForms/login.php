<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Patient Login</h2>
    <form action="Login_Process.php" method="POST">
        <label for="SSN">SSN</label>
        <input type="text" id="SSN" name="SSN" required>
        <br>
        <br>
        <label for="P_password">Password</label>
        <input type="password" id="P_password" name="P_password" required>
        <br>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>