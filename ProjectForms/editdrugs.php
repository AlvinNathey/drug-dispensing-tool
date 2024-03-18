<?php
require_once("connection.php");

$drug_name = "";
$drug_id = "";
$drug_quantity = "";
$drug_price = "";
$drug_category = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["drug_name"])) {
        header("Location: viewdrugs.php");
        exit;
    }

    $drug_name = $_GET["drug_name"];
    $sql = "SELECT * FROM tbldrugs WHERE drug_name = ?";
    
    // Create a prepared statement
    $stmt = mysqli_prepare($conn, $sql);
    
    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "s", $drug_name);
    
    // Execute the statement
    mysqli_stmt_execute($stmt);
    
    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $drug_name = $row["drug_name"];
        $drug_id = $row["drug_id"];
        $drug_quantity = $row["drug_quantity"];
        $drug_price = $row["drug_price"];
        $drug_category = $row["drug_category"];
    } else {
        header("Location: viewdrugs.php");
        exit;
    }

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $old_drug_name = $_GET["drug_name"]; // Keep the original drug_name for comparison
    $drug_name = $_POST["drug_name"];
    $drug_id = $_POST["drug_id"];
    $drug_quantity = $_POST["drug_quantity"];
    $drug_price = $_POST["drug_price"];
    $drug_category = $_POST["drug_category"];

    // Sanitize the input to prevent SQL injection
    $drug_name = mysqli_real_escape_string($conn, $drug_name);
    $drug_id = mysqli_real_escape_string($conn, $drug_id);
    $drug_quantity = mysqli_real_escape_string($conn, $drug_quantity);
    $drug_price = mysqli_real_escape_string($conn, $drug_price);
    $drug_category = mysqli_real_escape_string($conn, $drug_category);

    if (empty($drug_name) || empty($drug_id) || empty($drug_quantity) || empty($drug_price) || empty($drug_category)) {
        echo "All fields are required";
    } else {
        // Check if the new drug_name already exists in the database
        $check_sql = "SELECT * FROM tbldrugs WHERE drug_name = ?";
        
        // Create a prepared statement
        $check_stmt = mysqli_prepare($conn, $check_sql);
        
        // Bind the parameter
        mysqli_stmt_bind_param($check_stmt, "s", $drug_name);
        
        // Execute the statement
        mysqli_stmt_execute($check_stmt);
        
        // Get the result
        $existing_result = mysqli_stmt_get_result($check_stmt);

        if ($existing_row = mysqli_fetch_assoc($existing_result) && $drug_name !== $old_drug_name) {
            echo "Drug name already exists. Please choose a different name.";
        } else {
            // Update the drug information including drug_name
            $update_sql = "UPDATE tbldrugs SET drug_name = ?, drug_id = ?, drug_quantity = ?, drug_price = ?, drug_category = ? WHERE drug_name = ?";
            
            // Create a prepared statement
            $update_stmt = mysqli_prepare($conn, $update_sql);
            
            // Bind the parameters
            mysqli_stmt_bind_param($update_stmt, "ssssss", $drug_name, $drug_id, $drug_quantity, $drug_price, $drug_category, $old_drug_name);
            
            // Execute the statement
            $result = mysqli_stmt_execute($update_stmt);

            if ($result) {
                header('Location: viewdrugs.php');
                exit;
            } else {
                echo "Error updating drug information: " . mysqli_error($conn);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit drugs</title>
    <link rel="stylesheet" type="text/css" href="decorate.css">
</head>
<body>
<h1>Edit drugs</h1>
<form method="post">
    <label for="drug_name">Drug name</label>
    <input type="text" name="drug_name" id="drug_name" maxlength="100" required value="<?php echo $drug_name ?>">
    <br>
    <label for="drug_id">Drug ID</label>
    <input type="text" name="drug_id" id="drug_id" maxlength="20" required value="<?php echo $drug_id ?>">
    <br>
    <label for="drug_quantity">Quantity</label>
    <input type="text" name="drug_quantity" id="drug_quantity" maxlength="20" required value="<?php echo $drug_quantity ?>">
    <br>
    <label for="drug_price">Price per unit</label>
    <input type="number" name="drug_price" id="drug_price" maxlength="20" required value="<?php echo $drug_price ?>">
    <br>
    <br>
    <label for="drug_category">Category</label>
    <input type="text" name="drug_category" id="drug_category" maxlength="20" required value="<?php echo $drug_category ?>">
    <br>
    <input type="submit" value="Submit">
</form>
</body>
</html>
