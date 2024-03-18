<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h3 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        th, td {
            width: 16.67%;
        }

        th:first-child, td:first-child {
            width: 10%;
        }

        th:last-child, td:last-child {
            width: 10%;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }
        .edit-button {
      background-color: dodgerblue; /* Blue color for "Edit" button */
      color: black;
      border: none;
      border-radius: 5px;
      padding: 5px 10px;
      cursor: pointer;
     
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

    </style>
</head>
<body>
    <h3>This is the table for drugs</h3>
    <table id="patientstable">
        <tr>
            <th>Drug ID</th>
            <th>Drug Name</th>
            <th>Drug Quantity</th>
            <th>Drug Price</th>
            <th>Drug Category</th>
            <th>Drug Photo</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        require_once("connection.php");
        echo "<br>";
        $sql = "SELECT * FROM tbldrugs";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr> 
                <td> $row[drug_id] </td>
                <td> $row[drug_name]</td>
                <td> $row[drug_quantity]</td>
                <td> $row[drug_price]</td>
                <td> $row[drug_category]</td>
                <td><img src='$row[drug_photo]'></td>
                <td><button class='edit-button'><a href='/phptest/drug-dispensing-tool/ProjectForms/editdrugs.php?drug_name=$row[drug_name]'>Edit</a></td>
                <td><button class='delete-button'><a href='/phptest/drug-dispensing-tool/ProjectForms/deletedrugs.php?drug_name=$row[drug_name]'>Delete</a></td>
                </tr>";
            }
        } else {
            echo "No results";
        }
        $conn->close();
        ?>
    </table>
    <div style="text-align: center; margin-top: 20px;">
  <a href="pharmloggedin.php" style="background-color: #007bff; color: #fff; padding: 10px 20px; text-decoration: none; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">Go Back</a>
</div>

</body>
</html>
