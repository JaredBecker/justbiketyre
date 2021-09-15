<?php
$response = "";

if (isset($_GET["approve"]) || isset($_GET["remove"])) {
    $approve = $_GET["approve"];
    $remove = $_GET["remove"];

    if ($remove > 0) {
        $response = $db->RemoveUser($remove);
    } else if ($approve > 0) {
        $response = $db->ApproveUserAccount($approve);
    }

    header("Location: account_approvals.php");
}

$unapproved_accounts = $db->GetAllUnapprovedAccounts();
?>