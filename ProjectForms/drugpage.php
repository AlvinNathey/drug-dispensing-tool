
<?php 
$pageTitle = "Drugs";
include('data.php');
include('functions.php');
include 'header.php';?>

<div class="section catalog page">
    <div class="wrapper">
    <h2>Hello</h2>
        <ul class="items">
            <?php foreach($catalog as $id => $item) {
                 echo get_item_html($id,$item);
            }
            ?>
        </ul>
    </div>
</div>
<?php include 'footer.php';?>  
</body>
</html>