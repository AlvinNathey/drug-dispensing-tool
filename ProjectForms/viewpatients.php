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
      max-width: 2000px;
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

    .edit-link {
    text-decoration: none;
    padding: 5px 10px;
    background-color: #007bff; /* Blue color for "Edit" link */
    color: #fff;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
  }

  /* Style for the "Delete" link */
  .delete-link {
    text-decoration: none;
    padding: 5px 10px;
    background-color: #ff0000; /* Red color for "Delete" link */
    color: #fff;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
  }

  /* Hover styles for both links */
  .edit-link:hover {
    background-color: #0056b3; /* Darker blue on hover for "Edit" link */
  }

  .delete-link:hover {
    background-color: #ff3333; /* Darker red on hover for "Delete" link */
  }
  </style>
</head>
<body>
  <header>
    Patient Directory
  </header>
  <div class="container">
    <h3>This is the patient's table</h3>
    <table id="patientstable">
      <tr>
        <th>SSN</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone No</th>
        <th>Email</th>
        <th>Password</th>
        <th>Gender</th>
        <th>Age</th>
        <th>Associate Doctor</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      <?php
      require_once("connection.php");
      $sql = "SELECT * FROM tblpatients";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
                <td>{$row['SSN']}</td>
                <td>{$row['f_name']}</td>
                <td>{$row['l_name']}</td>
                <td>{$row['Phone_no']}</td>
                <td>{$row['Email']}</td>
                <td>{$row['P_password']}</td>
                <td>{$row['Gender']}</td>
                <td>{$row['Age']}</td>
                <td>{$row['AssociateDoctor']}</td>
                <td><a class='edit-link' href='/phptest/drug-dispensing-tool/ProjectForms/editpatients.php?SSN={$row['SSN']}'>Edit</a></td>
                <td><a class='delete-link' href='/phptest/drug-dispensing-tool/ProjectForms/deletepatients.php?SSN={$row['SSN']}'>Delete</a></td>
                </tr>";
        }
      } else {
        echo "<tr><td colspan='11'>No results</td></tr>";
      }
      $conn->close();
      ?>
    </table>
  </div>
</body>
</html>
