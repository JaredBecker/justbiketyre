<?php
$description = "";
$code = "";
$size = "";
$sell_price_ex_vat = "";
$current_type = "";
$current_manufacturer = "";
$types = $db->GetAllStockTypes();
$manufacturers = $db->GetAllManufacturers();

function validateInput($input_name, $value) {
    global $db;
    if (strip_tags(trim($value)) == "") {
        $db->CatchError($input_name . " can't be blank!");
        return false;
    }
    return $value;
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $stock_item = $db->GetStockItem($id);

    $current_type = $stock_item["type_id"];
    $current_manufacturer = $stock_item["manufacturer_id"];

    $description = $stock_item["description"] != "" ? $stock_item["description"] : "";
    $code = $stock_item["code"] != "" ? $stock_item["code"] : "";
    $size = $stock_item["size"] != "" ? $stock_item["size"] : "";
    $sell_price_ex_vat = $stock_item["sell_price_ex_vat"] != "" ? $stock_item["sell_price_ex_vat"] : "";
}

if (isset($_POST["submit"])) {
    $description = isset($_POST["description"]) ? $_POST["description"] : "";
    $code = isset($_POST["code"]) ? $_POST["code"] : "";
    $size = isset($_POST["size"]) ? $_POST["size"] : "";
    $sell_price_ex_vat = isset($_POST["sell_price_ex_vat"]) ? $_POST["sell_price_ex_vat"] : "";
    $type_id = isset($_POST["type_id"]) ? $_POST["type_id"] : "";
    $manufacturer_id = isset($_POST["manufacturer_id"]) ? $_POST["manufacturer_id"] : "";

    $stock_data = [];
    $stock_data["description"] = validateInput("Description", $description);
    $stock_data["code"] = validateInput("Code", $code);
    $stock_data["size"] = validateInput("Size", $size);
    $stock_data["sell_price_ex_vat"] = validateInput("Sell Price", $sell_price_ex_vat);
    $stock_data["type_id"] = $type_id;
    $stock_data["manufacturer_id"] = $manufacturer_id;

    if ($description && $code && $size && $sell_price_ex_vat && $type_id && $manufacturer_id) {
        if ($db->UpdateStockItem($id, $stock_data)) {
            header("Location: index.php");
        }
    }
}

?>