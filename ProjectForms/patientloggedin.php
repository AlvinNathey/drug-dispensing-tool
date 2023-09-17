<?php
session_start();

if (isset($_SESSION['logging'])) {

?>

<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #007bff;
      color: #fff;
      text-align: center;
      padding: 20px 0;
      font-size: 24px;
    }

    h3 {
      font-size: 20px;
      text-align: center;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

  

    /* Remove underlines from links */
    a {
      text-decoration: none;
    }

    .welcome {
      position: absolute;
      top: 0;
      right: 0;
    }
  </style>
  <title>Logged in page</title>
</head>
<body>
  <header>
    Patient's Directory
  </header>
  <div class="container">
    <div class="welcome">
      <h3>Welcome, <?php echo $_SESSION["f_name"]; ?></h3>
    </div>
    <p>Enter your SSN</p>
    <form method="post" action="">
      <label for="SSN"></label>
      <input type="text" name="SSN" id="SSN" maxlength="50" required>
      <br>
      <br>
      <input type="submit" name="search" id="search" value="Search">
      <br>
      <br>
    </form>
    <br>
    <br>
    <p>For prescriptions:</p>
    <table>
      <th>SSN</th>
      <th>f name</th>
      <th>diagnosis</th>
      <th>drug name</th>
      <th>drug price</th>
      <th>dosage</th>

      <?php
      require_once("connection.php");
      echo "<br>";

      // Check if the form is submitted and SSN is set
      if (isset($_POST['search']) && isset($_POST['SSN'])) {
        $SSN = $_POST['SSN'];

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM tblprescriptions WHERE SSN = ?");
        $stmt->bind_param("s", $SSN);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td> $row[SSN]</td>  
              <td> $row[f_name] </td>
              <td> $row[diagnosis]</td>
              <td> $row[drug_name]</td>
              <td> $row[drug_prize]</td>
              <td> $row[dosage]</td>
              </tr>";
          }
        } else {
          echo "No results";
        }

        $stmt->close();
      }

      ?>

    </table>
    <br>
    <br>
    <p>For user details:</p>
    <br>
    <br>
    <table id="patientstable">
      <th>SSN</th>
      <th>f name</th>
      <th>l name</th>
      <th>Phone no </th>
      <th> Email</th>
      <th>Password </th>
      <th>Gender</th>
      <th>Age </th>
      <th>Associate Doctor </th>
      
      <?php
      require_once("connection.php");
      echo "<br>";

      // Check if the form is submitted and SSN is set
      if (isset($_POST['search']) && isset($_POST['SSN'])) {
        $SSN = $_POST['SSN'];

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM tblpatients WHERE SSN = ?");
        $stmt->bind_param("s", $SSN);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
              <td> $row[SSN]</td>  
              <td> $row[f_name] </td>
              <td> $row[l_name]</td>
              <td> $row[Phone_no]</td>
              <td> $row[Email]</td> 
              <td> $row[P_password]</td>
              <td> $row[Gender]</td>
              <td> $row[Age]</td>
              <td> $row[AssociateDoctor]</td>
              </tr>";
          }
        } else {
          echo "No results";
        }

        $stmt->close();
      }

      $conn->close();
      ?>

    </table>
  </div>
  <!-- Logout button -->
<a href="patientlogout.php" style="display: block; background-color: #007bff; color: #fff; padding: 10px 20px; text-decoration: none; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; position: relative; bottom: 0; left: 0;">Logout</a>

</body>
</html>

<?php
} else {
    header("Location: patientlogin.html");
}
?>
