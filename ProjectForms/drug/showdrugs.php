<?php
$section = null;
include ('data.php');
include ('functions.php');

if(isset($_GET["id"])){
    $id = $_GET['id'];
    if(isset($catalog[$id])){
        $item = $catalog[$id];
    }
}
$pageTitle = $item["title"];
include ('detailsheader.php');
?>
<link rel="stylesheet"  href="edit.css">
<div class = "section page">
    <div class = "wrapper">
        <div class = "media-picture">
            <span>
                <img src = "<?php echo $item["img"];?>" alt = "<?php echo $item["title"];?>" />
                
            </span>
        </div>
        <div class = "media-details">
            <table>
                <tr>
                    <th>Drug name</th>
                    <td><?php echo $item["title"];?></td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td><?php echo $item["category"];?></td>
                </tr>
                <tr>
                    <th>Drug ID</th>
                    <td><?php echo $item["drug_id"];?></td>
                </tr>
                <tr>
                    <th>Drug Quantity</th>
                    <td><?php echo $item["drug_quantity"];?></td>
                </tr>
                <tr>
                    <th>Drug Price</th>
                    <td><?php echo $item["drug_price"];?></td>
                </tr>

            </table>
        </div>
            
    </div>    
</div>
<?php include ('footer.php');?>
