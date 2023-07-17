<html>
<head>
  <style>
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
</head>
    <body>
      <h3>This is the table for drugs<h3>
        <table id="drugstable">
            <th>drug_name</th>
            <th>drug_id</th>
            <th>drug_quantity</th>
            <th>drug_price </th>
            <th>Edit</th>
            <th>Delete</th>

            <?php
            require_once("connection.php");
             echo"<br>";
            $sql = " SELECT * FROM tbldrugs";
            $result = $conn->query($sql);

            if($result-> num_rows > 0){
                    while($row = $result -> fetch_assoc()){
                    echo "<tr>
                    <td> $row[drug_name]</td>  
                    <td> $row[drug_id] </td>
                    <td> $row[drug_quantity]</td>
                    <td> $row[drug_price]</td>
                    <td><a href = '/phptest/drug-dispensing-tool/ProjectForms/editdrugs.php?drug_name=$row[drug_name]'> Edit </a> </td>
                    <td><a href ='/phptest/drug-dispensing-tool/ProjectForms/deletedrugs.php?drug_name=$row[drug_name]'>Delete</a></td>
                     </tr>";
                    }
             }
            else{
             echo "No results";
            }
             $conn->close();
             ?>
        </table>
        <script type='text/javascript' src="pagination.js" ></script>
    </body>    
</html>