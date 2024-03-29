<?php 
$pageTitle = "MyDrugDispenser";
$section = null;
include('drug/data.php');
include('functions.php');

if (isset($_GET["cat"])) {
    $cat = $_GET["cat"];
    if ($cat == "Analgesics") {
        $pageTitle = "Analgesics";
        $section = "Analgesics";

    } else if ($cat == "Anesthetics") {
        $pageTitle = "Anesthetics";
        $section = "Anesthetics";

    } else if ($cat == "Anticoagulants") {
        $pageTitle = "Anti coagulants";
        $section = "Anticoagulants";

    } else if ($cat == "Antibiotics") {
        $pageTitle = "Anti biotics";
        $section = "Antibiotics";
    }
}


include 'body/header.php';?>


<div class="section catalog page">
    <div class="wrapper">
    <h2><?php echo $pageTitle;?></h2>
        <ul class="items">
            <?php
            $categories = array_category($catalog, $section);

             foreach($categories as $id) {
                 echo get_item_html($id,$catalog[$id]);
            }
            ?>
        </ul>
        <form action="pharmacist/pharmloggedin.php" method="GET">
    <button type="submit">Go Back to pharmloggedin</button>
</form>
    </div>
    
<?php include 'body/footer.php';?>
