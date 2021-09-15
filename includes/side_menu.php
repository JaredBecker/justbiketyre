<?php
$manufacturers = $db->GetAllManufacturers();
$stock_types = $db->GetAllStockTypes();
?>
<div class="side_menu_content">
    <h4>Manufacturers</h4>
    <?php
    if (count($manufacturers) > 0) {
        ?>
        <ul>
            <?php
            foreach ($manufacturers as $manufacturer) {
                ?>
                <li>
                    <a href="index.php?manufacturer=<?php echo $manufacturer["id"]?>">
                        <?php echo $manufacturer["description"] ?>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
        <?php
    } else {
        ?>
        <p>No Manufacturers Detected...</p>
        <?php
    }
    ?>
    <h4>Stock Type</h4>
    <?php
    if (count($stock_types) > 0) {
        ?>
        <ul>
            <?php
            foreach($stock_types as $type) {
                ?>
                <li>
                    <a href="index.php?stock_type=<?php echo $type["id"] ?>">
                        <?php echo $type["description"] ?>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
        <?php
    }
    ?>
    <h4>Account Approvals</h4>
    <ul>
        <li>
            <a href="account_approvals.php">View Pending Approvals</a>
        </li>
    </ul>
</div>