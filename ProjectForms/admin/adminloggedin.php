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
    <title>Admin logged in</title>

    <script>
    // Function to display the success message and hide it after a set time
    function showSuccessMessage() {
      var successMessage = document.getElementById("success-message");
      successMessage.style.display = "block";
      
      // Set a timeout to hide the message after 5 seconds (5000 milliseconds)
      setTimeout(function() {
        successMessage.style.display = "none";
      }, 500);
    }
  </script>

</head>
<body>

<!-- Success message container -->
<div id="success-message" style="display: inline-block; background-color: #4CAF50; color: white; text-align: center; padding: 10px;">
    Admin successfully registered
</div>


  <!-- Call the function to show the success message -->
  <script>
    showSuccessMessage();
  </script>

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
    <input type="button" value="Drugs" class="action-button" onclick="redirectToDrugsView()">
</div>

<h2>What information do you want to add?</h2>
<div class = "horizontal-buttons">
    <input type="button" value="Add Doctor" class="action-button" onclick="redirectToAddDoctorView()">
    <input type="button" value="Add Patient" class="action-button" onclick="redirectToAddPatientView()">
    <input type="button" value="Add Pharmacist" class="action-button" onclick="redirectToAddPharmacistView()">
    <input type="button" value="Drugs" class="action-button" onclick="redirectToAddDrugsView()">
</div>

<!-- Logout button -->
<a href="../admin/adminlogout.php" style="position: fixed; left: 10px; bottom: 10px; background-color: #007bff; color: #fff; padding: 10px 20px; text-decoration: none; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">Logout</a>

<script>
    function redirectToDoctorView() {
        window.location.href = "../doctor/viewdoctors.php";
    }

    function redirectToAdminView() {
        window.location.href = "../patient/viewpatients.php";
    }

    function redirectToPharmacistView() {
        window.location.href = "../pharmacist/viewpharmacists.php";
    }
    function redirectToDrugsView() {
        window.location.href = "../drug/viewdrugsreplica.php";
    }
    ///
    function redirectToAddDoctorView() {
        window.location.href = "../doctor/doctorsignup.html";
    }

    function redirectToAddPatientView() {
        window.location.href = "../patient/patientsignup.html";
    }

    function redirectToAddPharmacistView() {
        window.location.href = "../pharmacist/pharmacistsignup.html";
    }
    function redirectToAddDrugsView() {
        window.location.href = "../drug/inputDrugs.html";
    }

</script>
</body>
</html>

<?php
} else {
    header("Location: ../admin/adminlogin.html");
}
?>
