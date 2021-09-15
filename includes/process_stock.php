<?php
$manufacturers_id = "";
$stock_type_id = "";
$min_price = 0;
$max_price = 0;
$filter_stock = false;

if (isset($_GET["manufacturer"])) {
    $filter_stock = true;
    $manufacturers_id = $_GET["manufacturer"];
}
if (isset($_GET["stock_type"])) {
    $filter_stock = true;
    $stock_type_id = $_GET["stock_type"];
}
if (isset($_GET["min_price"])) {
    $filter_stock = true;
    $min_price = $_GET["min_price"];
}
if (isset($_GET["max_price"])) {
    $filter_stock = true;
    $max_price = $_GET["max_price"];
}

if ($filter_stock) {
    if ($min_price > $max_price) {
        $price = [
            "min" => $max_price,
            "max" => $min_price
        ];
        $min_price = $price["min"];
        $max_price = $price["max"];
    }
    $stock_listing = $db->GetFilteredStock($manufacturers_id, $stock_type_id, $min_price, $max_price);
} else {
    $stock_listing = $db->GetAllStock();
}
?>