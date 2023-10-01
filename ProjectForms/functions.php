<?php

function get_item_html($id, $item) {
    $output = "<li><a href='showdrugs.php?id=$id'><img src='"
        . $item["img"] . "' alt='"
        . $item["title"] . "'>
               <p> View details </p>
               </a></li>";
    return $output;
}

function array_category($catalog, $category) {
    $output = array();
    foreach ($catalog as $id => $item) {
        if (isset($item["category"]) && strtolower($category) == strtolower($item["category"])) {
            $output[] = $id;
        }
    }
    asort($output);
    return $output;
}

?>