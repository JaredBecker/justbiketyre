<?php
$title = "Just Bike Tyre | Stock Details";
include_once("includes/header.php");

if (isset($_SESSION["USER_LOGGED_IN"]) && $_SESSION["USER_LOGGED_IN"]) {
    include_once("includes/process_stock_details.php");
    include_once("includes/navbar.php");
    ?>
    <div class="main_wrapper">
        <div class="side_menu closed" aria-expanded="true">
            <?php
            include_once("includes/side_menu.php");
            ?>
        </div>
        <div class="content p-5 w-100">
            <?php
            if (isset($_SESSION["ERROR_MESSAGE"]) && $_SESSION["ERROR_MESSAGE"] != "") {
                ?>
                <div class="alert alert-warning">
                    <?php echo $_SESSION["ERROR_MESSAGE"] ?>
                </div>
                <?php
            }
            ?>
            <h1 class="d-flex justify-content-between align-items-center">
                Edit Details
                <a href="index.php" class="btn btn-primary px-3 py-2">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </h1>
            <hr>
            <form action="stock_details.php?id=<?php echo $id?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="row">
                    <div class="mb-3 col-sm-6">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" id="description" value="<?php echo $description ?>">
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="code" class="form-label">Code</label>
                        <input type="text" class="form-control" name="code" id="code" value="<?php echo $code ?>">
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="size" class="form-label">Size</label>
                        <input type="text" class="form-control" name="size" id="size" value="<?php echo $size ?>">
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="sell_price" class="form-label">Sell Price Ex VAT</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">R</span>
                            <input type="number" class="form-control" name="sell_price_ex_vat" id="sell_price" value="<?php echo number_format($sell_price_ex_vat, 2, ".", "") ?>">
                        </div>
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="type_id" class="form-label">Type</label>
                        <select class="form-select" name="type_id" id="type_id">
                            <option value="0" selected>No Type Set</option>
                            <?php
                            if (count($types) > 0) {
                                foreach($types as $type) {
                                    ?>
                                    <option value="<?php echo $type["id"] ?>" <?php echo $current_type == $type["id"] ? "selected" : "" ?>>
                                        <?php echo $type["description"] ?>
                                    </option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3 col-sm-6">
                        <label for="manufacturer_id" class="form-label">Manufacturer</label>
                        <select class="form-select" name="manufacturer_id" id="manufacturer_id">
                            <option value="0">No Manufacturer Set</option>
                            <?php
                            if (count($manufacturers) > 0) {
                                foreach($manufacturers as $manufacturer) {
                                    ?>
                                    <option value="<?php echo $manufacturer["id"] ?>" <?php echo $current_manufacturer == $manufacturer["id"] ? "selected" : "" ?>>
                                        <?php echo trim($manufacturer["description"]) ?>
                                    </option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12 text-center">
                        <button name="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    $hide_footer = false;
    $sticky = true;
    include_once("includes/footer.php");
} else {
    header("Location: login.php");
}
