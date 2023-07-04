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
             echo"<br>";
            $sql = " SELECT * FROM tblpatients";
            $result = $conn->query($sql);

            if($result-> num_rows > 0){
                    while($row = $result -> fetch_assoc()){
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
                    <td><a href = '/phptest/drug-dispensing-tool/ProjectForms/edit.php?SSN=$row[SSN]'> Edit </a> </td>
                    <td><a href ='/phptest/drug-dispensing-tool/ProjectForms/delete.php?SSN=$row[SSN]'>Delete</a></td>
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