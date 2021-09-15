<?php
$current_timestamp = time();

if (isset($_SESSION["SESSION_EXPIRE_TIME"])) {
    if ($current_timestamp > $_SESSION["SESSION_EXPIRE_TIME"]) {
        foreach ($_SESSION as $key => $value) {
            unset($_SESSION[$key]);
        }
        session_unset();
        session_destroy();
        header("Location: login.php");
    }
}