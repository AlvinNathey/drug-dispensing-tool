<?php 
$pageTitle = "All Drugs";
$section = null;

/*$catalog = array(
    "101" => "Asprin",
    "102" => "ibuprofen",
    "103" => "naproxen",
    "104" => "tylenol"
);*/
include('data.php');
include('functions.php');

if(isset($_GET["cat"])) {
    if($_GET["cat"] == "drug1"){
        $pageTitle = "Analgesics";
        $section = "drug1";
    } else if($_GET["cat"] == "drug2"){
        $pageTitle = "Anesthetics";
        $section = "drug2";
    } else if($_GET["cat"] == "drug3"){
        $pageTitle = "Anti coagulants";
        $section = "drug3";
    } else if($_GET["cat"] == "drug4"){    
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
             foreach($catalog as $id => $item) {
                 echo get_item_html($id,$item);
            }
            ?>
        </ul>
    </div>

<?php include 'footer.php';?>
