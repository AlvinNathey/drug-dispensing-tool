<?php
session_start();

if (isset($_SESSION['logging'])) {

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
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 8px;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }
    
  </style>
    <title>logged in page</title>
    </head>
    <body>
       <div class="welcome">
    <h3>Welcome, <?php echo $_SESSION["f_name"]; ?></h3>
    
        </div>
        <p>Enter your SSN</p>
        <form method="post" action="">
            <label for="SSN">SSN</label>
            <input type="text" name="SSN" id="SSN" maxlength="50" required>
            <br>
            <br>
            <input type="submit" name="search" id="search" value="search">
            <br>
            <br>
         </form>
            <br>
            <br>
           <p> For prescriptions:</p>
         <table>
            <th>SSN</th>
            <th>f_name</th>
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
            <th>f_name</th>
            <th>l_name</th>
            <th>Phone_no </th>
            <th> Email</th>
            <th>P_password </th>
            <th>Gender</th>
            <th>Age </th>
            <th>AssociateDoctor </th>
            <th>Edit</th>
            <th>Delete</th>
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
                            <td><a href='/phptest/drug-dispensing-tool/ProjectForms/editpatients.php?SSN=$row[SSN]'> Edit </a> </td>
                            <td><a href='/phptest/drug-dispensing-tool/ProjectForms/deletepatients.php?SSN=$row[SSN]'>Delete</a></td>
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
    </body>
    </html>

<?php
} else {
    header("Location: patientlogin.html");
}
?>
