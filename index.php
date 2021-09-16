<?php
$title = "Just Bike Tyre | Stock Listing";
include_once("includes/header.php");

if (isset($_SESSION["USER_LOGGED_IN"]) && $_SESSION["USER_LOGGED_IN"]) {
    include_once("includes/process_stock.php");
    include_once("includes/navbar.php");
    ?>
    <div class="main_wrapper">
        <div class="side_menu closed" aria-expanded="true">
            <?php
            include_once("includes/side_menu.php");
            ?>
        </div>
        <div class="content p-5 w-100">
            <div class="stock_filter">
                <form action="" method="GET">
                    <h4 class="text-center">Filter Stock</h4>
                    <div class="row">
                        <div class="col-6 col-lg-4 mb-3">
                            <select class="form-control" name="manufacturer" id="manufacturer" value="<?php echo $manufacturers_id ?>">
                                <option value="">Select Manufacturer...</option>
                                <?php
                                if (count($manufacturers) > 0) {
                                    foreach($manufacturers as $manufacturer) {
                                        ?>
                                        <option value="<?php echo $manufacturer["id"] ?>" <?php echo $manufacturers_id == $manufacturer["id"] ? "selected" : "" ?>>
                                            <?php echo $manufacturer["description"] ?>
                                        </option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-6 col-lg-4 mb-3">
                            <select class="form-control" name="stock_type" id="stock_type" value="<?php echo $stock_type_id ?>">
                                <option value="">Select Stock Type...</option>
                                <?php
                                if (count($stock_types) > 0) {
                                    foreach($stock_types as $type) {
                                        ?>
                                        <option value="<?php echo $type["id"] ?>" <?php echo $stock_type_id == $type["id"] ? "selected" : "" ?>>
                                            <?php echo $type["description"] ?>
                                        </option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-12 col-lg-4 d-flex align-items-center mb-3">
                            <div class="input-group">
                                <span class="input-group-text">Price</span>
                                <input type="text" name="min_price" aria-label="Min Price" class="form-control" placeholder="Min" value="<?php echo $min_price > 0 ? $min_price : "" ?>">
                                <input type="text" name="max_price" aria-label="Max Price" class="form-control" placeholder="Max" value="<?php echo $max_price > 0 ? $max_price : "" ?>">
                            </div>
                        </div>
                        <div class="col-12 d-flex align-items-center">
                            <button class="btn btn-primary w-100">Apply Filter</button>
                        </div>
                    </div>
                </form>
            </div>
            <div id="table_wrapper">
                <table id="stock_table" class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Code</th>
                            <th scope="col">Description</th>
                            <th scope="col">Manufacturer</th>
                            <th scope="col">Size</th>
                            <th scope="col">Type</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($stock_listing) {
                            if (count($stock_listing) > 0) {
                                foreach ($stock_listing as $stock_item) {
                                    $href = "stock_details.php?id={$stock_item['id']}";
                                    ?>
                                    <tr>
                                        <th scope="row">
                                            <a href="<?php echo  $href ?>"><?php echo  $stock_item["id"] ?></a>
                                        </th>
                                        <td><?php echo  $stock_item["code"] ?></td>
                                        <td><?php echo  $stock_item["description"] ?></td>
                                        <td><?php echo  $stock_item["manufacturer_description"] ?></td>
                                        <td><?php echo  $stock_item["size"] ?></td>
                                        <td><?php echo  isset($stock_item["type_description"]) ? $stock_item["type_description"] : "No Type Found" ?></td>
                                        <td class="text-right">R <?php echo  number_format($stock_item["sell_price_ex_vat"], 2) ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
    $hide_footer = false;
    include_once("includes/footer.php");
} else {
    header("Location: login.php");
}
