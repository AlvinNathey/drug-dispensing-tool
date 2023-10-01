<?php 
$pageTitle = "All Drugs";
$section = null;
include('data.php');
include('functions.php');

if (isset($_GET["cat"])) {
    $cat = $_GET["cat"];
    if ($cat == "drug1") {
        $pageTitle = "Analgesics";
        $section = "drug1";
    } else if ($cat == "drug2") {
        $pageTitle = "Anesthetics";
        $section = "drug2";
    } else if ($cat == "drug3") {
        $pageTitle = "Anti coagulants";
        $section = "drug3";
    } else if ($cat == "drug4") {
        $pageTitle = "Anti biotics";
        $section = "drug4";
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
