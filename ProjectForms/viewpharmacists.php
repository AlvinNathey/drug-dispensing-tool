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
        <table id="pharmaciststable">
            <th>pharmacist_id</th>
            <th>pharmacist_fname</th>
            <th>pharmacistl_name</th>
            <th>pharm_password </th>
            <th>Edit</th>
            <th>Delete</th>

            <?php
            require_once("connection.php");
             echo"<br>";
            $sql = " SELECT * FROM tblpharmacists";
            $result = $conn->query($sql);

            if($result-> num_rows > 0){
                    while($row = $result -> fetch_assoc()){
                    echo "<tr>
                    <td> $row[pharmacist_id]</td>  
                    <td> $row[pharmacist_fname] </td>
                    <td> $row[pharmacist_lname]</td>
                    <td> $row[pharm_password]</td>
                    <td><a href = '/phptest/drug-dispensing-tool/ProjectForms/editpharmacists.php?pharmacist_id=$row[pharmacist_id]'> Edit </a> </td>
                    <td><a href ='/phptest/drug-dispensing-tool/ProjectForms/deletepharmacists.php?pharmacist_id=$row[pharmacist_id]'>Delete</a></td>
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