<?php
$title = "Just Bike Tyre | Stock Listing";
include_once("includes/header.php");

if (isset($_SESSION["USER_LOGGED_IN"]) && $_SESSION["USER_LOGGED_IN"]) {
    include_once("includes/process_account_approvals.php");
    include_once("includes/navbar.php");
    ?>
    <div class="main_wrapper p-5">
        <div class="side_menu closed" aria-expanded="true">
            <?php
            include_once("includes/side_menu.php");
            ?>
        </div>
        <h1 class="text-center">Pending Approvals</h1>
        <?php
        if ($response != "") {
            ?>
            <div class="alert <?php echo $response["successful"] ? "alert-success" : "alert-danger" ?>">
                <?php echo $response["msg"] ?>
            </div>
            <?php
        }
        ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Company Name</th>
                    <th>Email</th>
                    <th>Approve</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($unapproved_accounts) {
                    foreach ($unapproved_accounts as $account) {
                        ?>
                        <tr>
                            <td><?php echo $account["id"] ?></td>
                            <td><?php echo $account["full_name"] ?></td>
                            <td><?php echo $account["company"] ?></td>
                            <td><?php echo $account["email"] ?></td>
                            <td>
                                <a href="account_approvals.php?approve=<?php echo $account["id"] ?>" class="btn btn-primary">
                                    <i class="far fa-check-square" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                <a href="account_approvals.php?remove=<?php echo $account["id"] ?>" class="btn btn-danger">
                                    <i class="fas fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="6">
                            <?php echo "No accounts accounts awaiting approval..."; ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
    $hide_footer = false;
    include_once("includes/footer.php");
} else {
    header("Location: login.php");
    die();
}
?>