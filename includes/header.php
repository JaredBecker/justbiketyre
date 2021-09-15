<?php
session_start();
ob_start();

include_once("helpers/database/MysqliDb.php");
include_once("includes/db.php");
$db = new DataBaseWorker();

if (isset($_SESSION["USER_LOGGED_IN"]) && $_SESSION["USER_LOGGED_IN"]) {
    include("includes/session.php");
}

if (isset($_POST["logout"])) {
    unset($_SESSION["USER_LOGGED_IN"]);
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

    <title><?php echo  $title ?></title>
</head>

<body class="body">
    <div class="shadow_layer" onclick="toggleSideMenu()"></div>