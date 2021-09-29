<?php
$description = "";
$code = "";
$size = "";
$sell_price_ex_vat = "";
$current_type = "";
$current_manufacturer = "";
$types = $db->GetAllStockTypes();
$manufacturers = $db->GetAllManufacturers();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

if (isset($_POST["submit"])) {
    $description = isset($_POST["description"]) ? $_POST["description"] : "";
    $code = isset($_POST["code"]) ? $_POST["code"] : "";
    $size = isset($_POST["size"]) ? $_POST["size"] : "";
    $sell_price_ex_vat = isset($_POST["sell_price_ex_vat"]) ? $_POST["sell_price_ex_vat"] : "";
    $type_id = isset($_POST["type_id"]) ? $_POST["type_id"] : "";
    $manufacturer_id = isset($_POST["manufacturer_id"]) ? $_POST["manufacturer_id"] : "";

    $stock_data = [];
    $stock_data["description"] = $description;
    $stock_data["code"] = $code;
    $stock_data["size"] = $size;
    $stock_data["sell_price_ex_vat"] = $sell_price_ex_vat;
    $stock_data["type_id"] = $type_id;
    $stock_data["manufacturer_id"] = $manufacturer_id;

    $db->UpdateStockItem($id, $stock_data);
}

if ($id > 0) {
    $id = $_GET["id"];
    $stock_item = $db->GetStockItem($id);

    $current_type = $stock_item["type_id"];
    $current_manufacturer = $stock_item["manufacturer_id"];

    $description = $stock_item["description"] != "" ? $stock_item["description"] : "";
    $code = $stock_item["code"] != "" ? $stock_item["code"] : "";
    $size = $stock_item["size"] != "" ? $stock_item["size"] : "";
    $sell_price_ex_vat = $stock_item["sell_price_ex_vat"] != "" ? $stock_item["sell_price_ex_vat"] : "";
}
?>