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
      <h3>This is the doctor's table<h3>
        <table id="patientstable">
            <th>doc_id</th>
            <th>doc_fname</th>
            <th>doc_lname</th>
            <th>doc_password </th>
            <th>Edit</th>
            <th>Delete</th>

            <?php
            require_once("connection.php");
             echo"<br>";
            $sql = " SELECT * FROM tbldoctors";
            $result = $conn->query($sql);

            if($result-> num_rows > 0){
                    while($row = $result -> fetch_assoc()){
                    echo "<tr>
                    <td> $row[doc_id]</td>  
                    <td> $row[doc_fname] </td>
                    <td> $row[doc_lname]</td>
                    <td> $row[doc_password]</td>
                    <td><a href = '/phptest/drug-dispensing-tool/ProjectForms/editdoctors.php?doc_id=$row[doc_id]'> Edit </a> </td>
                    <td><a href ='/phptest/drug-dispensing-tool/ProjectForms/deletedoctors.php?doc_id=$row[doc_id]'>Delete</a></td>
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