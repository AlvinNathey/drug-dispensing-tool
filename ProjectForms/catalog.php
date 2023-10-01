<?php 
$pageTitle = "All Drugs";
$section = null;
include('data.php');
include('functions.php');

if (isset($_GET["cat"])) {
    $cat = $_GET["cat"];
    if ($cat == "Analgesics") {
        $pageTitle = "Analgesics";
        $section = "Analgesics";
    } else if ($cat == "Anesthetics") {
        $pageTitle = "Anesthetics";
        $section = "Anesthetics";
    } else if ($cat == "Anticogulants") {
        $pageTitle = "Anti coagulants";
        $section = "Anticogulants";
    } else if ($cat == "Antibiotics") {
        $pageTitle = "Anti biotics";
        $section = "Antibiotics";
    }
}


include 'header.php';?>

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
    </div>

<?php include 'footer.php';?>
