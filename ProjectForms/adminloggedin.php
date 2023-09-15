<?php
session_start();

if(isset($_SESSION['logging'])){
?>

<!DOCTYPE html>
<html>
<head>
    <style>
      body{
        background-color: darkseagreen;
      }
        .welcome {
            position: absolute;
            top: 0;
            right: 0;
        }

        .vertical-buttons {
            display: flex;
            flex-direction: column; /* Arrange buttons vertically */
            align-items: flex-start; /* Align buttons to the left */
        }

        /* Style for the buttons */
        .action-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 10px; /* Add spacing between buttons */
            width: 150px; /* Set button width */
        }

        /* Hover effect */
        .action-button:hover {
            background-color: #0056b3; /* Darker color on hover */
        }
    </style>
    <title>Logged In Page</title>
</head>
<body>
<div class="welcome">
    <h3>Welcome Admin, <?php echo $_SESSION["admin_fname"] ; ?></h3>
    <br><br>
</div>
<h2>What information do you want to view?</h2>

<!-- Vertical buttons container -->
<div class="vertical-buttons">
    <input type="button" value="Doctor" class="action-button" onclick="redirectToDoctorView()">
    <input type="button" value="Patient" class="action-button" onclick="redirectToAdminView()">
    <input type="button" value="Pharmacist" class="action-button" onclick="redirectToPharmacistView()">
</div>

<!-- Logout button -->
<a href="adminlogout.php" style="position: fixed; left: 10px; bottom: 10px; background-color: #007bff; color: #fff; padding: 10px 20px; text-decoration: none; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">Logout</a>

<script>
    function redirectToDoctorView() {
        window.location.href = "viewdoctors.php";
    }

    function redirectToAdminView() {
        window.location.href = "viewpatients.php";
    }

    function redirectToPharmacistView() {
        window.location.href = "viewpharmacists.php";
    }
</script>
</body>
</html>

<?php
} else {
    header("Location: adminlogin.html");
}
?>
