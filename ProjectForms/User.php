<!DOCTYPE html>
<html>
<head>
    <title>User Page</title>
</head>
<body>
    <h2>Welcome, <?php
    session_start();
     echo $_SESSION['SSN']; ?></h2>
    <p>This is the user page.</p>
</body>
</html>
