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

    /* Style for the "Edit" button */
    .edit-button {
      background-color: #007bff; /* Blue color for "Edit" button */
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 5px 10px;
      cursor: pointer;
      text-decoration: none;
    }

    /* Style for the "Delete" button */
    .delete-button {
      background-color: #ff0000; /* Red color for "Delete" button */
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 5px 10px;
      cursor: pointer;
      text-decoration: none;
    }

    /* Hover styles for both buttons */
    .edit-button:hover {
      background-color: #0056b3; /* Darker blue on hover for "Edit" button */
    }

    .delete-button:hover {
      background-color: #ff3333; /* Darker red on hover for "Delete" button */
    }

    /* Remove underlines from links */
    a {
      text-decoration: none;
    }
  </style>
</head>
<body>
  <header>
    Doctor Directory
  </header>
  <div class="container">
    <h3>This is the doctor's table</h3>
    <table>
      <tr>
        <th>Doctor ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Password</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      <?php
      require_once("connection.php");
      $page = isset($_GET['page']) ? $_GET['page'] : 1;
      $records_per_page = 5; // Number of records to display per page
      $offset = ($page - 1) * $records_per_page;

      $sql = "SELECT * FROM tbldoctors LIMIT $offset, $records_per_page";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
                <td>{$row['doc_id']}</td>
                <td>{$row['doc_fname']}</td>
                <td>{$row['doc_lname']}</td>
                <td>{$row['doc_password']}</td>
                <td><button class='edit-button'><a href='/phptest/drug-dispensing-tool/ProjectForms/editdoctors.php?doc_id={$row['doc_id']}'>Edit</a></button></td>
                <td><button class='delete-button'><a href='/phptest/drug-dispensing-tool/ProjectForms/deletedoctors.php?doc_id={$row['doc_id']}'>Delete</a></button></td>
                </tr>";
        }
      } else {
        echo "<tr><td colspan='6'>No results</td></tr>";
      }
      $conn->close();
      ?>
    </table>
  </div>
  <script type='text/javascript' src="pagination.js"></script>
  
  <div style="text-align: center; margin-top: 20px;">
  <a href="adminloggedin.php" style="background-color: #007bff; color: #fff; padding: 10px 20px; text-decoration: none; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">Go Back</a>
</div>

</body>
</html>
