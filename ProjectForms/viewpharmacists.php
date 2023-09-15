<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: honeydew;
      margin: 0;
      padding: 0;
    }

    h3 {
      font-size: 24px;
      text-align: center;
      margin: 20px 0;
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
      margin: 20px 0;
    }

    th, td {
      padding: 12px;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    th, td {
      text-align: center;
    }

    /* Style for "Edit" and "Delete" links */
    a {
      text-decoration: none;
      padding: 5px 10px;
      border-radius: 5px;
      font-weight: bold;
    }

    /* Blue color for "Edit" links */
    a.edit-link {
      background-color: #007bff;
      color: #fff;
    }

    /* Red color for "Delete" links */
    a.delete-link {
      background-color: #ff0000;
      color: #fff;
    }

    /* Hover styles for links */
    a.edit-link:hover {
      background-color: #0056b3; /* Darker blue on hover for "Edit" links */
    }

    a.delete-link:hover {
      background-color: #ff3333; /* Darker red on hover for "Delete" links */
    }
  </style>
</head>
<body>
  <h3>This is the pharmacist's table</h3>
  <table>
    <tr>
      <th>pharmacist id</th>
      <th>pharmacist fname</th>
      <th>pharmacist lname</th>
      <th>pharm password</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    <?php
    require_once("connection.php");
    $sql = "SELECT * FROM tblpharmacists";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['pharmacist_id']}</td>
                <td>{$row['pharmacist_fname']}</td>
                <td>{$row['pharmacist_lname']}</td>
                <td>{$row['pharm_password']}</td>
                <td><a class='edit-link' href='/phptest/drug-dispensing-tool/ProjectForms/editpharmacists.php?pharmacist_id={$row['pharmacist_id']}'>Edit</a></td>
                <td><a class='delete-link' href='/phptest/drug-dispensing-tool/ProjectForms/deletepharmacists.php?pharmacist_id={$row['pharmacist_id']}'>Delete</a></td>
              </tr>";
      }
    } else {
      echo "<tr><td colspan='6'>No results</td></tr>";
    }
    $conn->close();
    ?>
  </table>
  <script type='text/javascript' src="pagination.js"></script>
</body>
</html>
