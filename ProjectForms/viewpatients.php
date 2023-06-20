<html>
    <body>
        <table>
            <th>SSN</th>
            <th>f_name</th>
            <th>l_name</th>
            <th>Phone_no </th>
            <th> Email</th>
            <th>P_password </th>
            <th>Gender</th>
            <th>Age </th>
            <th>AssociateDoctor </th>
       
            <?php
            require_once("./connection.php");
             echo"<br>";
            $sql = " SELECT * FROM tblpatient ";
            $result = $conn->query($sql);

            if($result-> num_rows > 0){
                    while($row = $result -> fetch_assoc()){
                    echo "<tr><td>". $row["SSN"]. "</td>" . "<td>". $row["f_name"]."<td>". $row["l_name"]. "</td>" ."</td>" . "<td>". $row["Phone_no"]. "</td>" . "<td>". $row["Email"]. "</td>" . "<td>". $row["P_password"]. "</td>" . "<td>". $row["gender"]. "</td>" . "<td>". $row["Age"]. "</td>" . "<td>". $row["AssociateDoctor"]. "</tr></td>";
                    }
             }
            else{
             echo "No results";
            }
             $conn->close();
             ?>
        </table>
    </body>    
</html>