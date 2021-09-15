<?php
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $user_data = $db->db->where("email", $email)->where("password", $password)->getOne("users");
        if ($user_data != null) {
            if ($user_data["approved"]) {
                $_SESSION["USER_LOGGED_IN"] = true;
                $_SESSION["SESSION_EXPIRE_TIME"] = (time() + (30 * 60));
                header("Location: index.php");
            } else {
                $db->CatchError("Account awaiting approval.");
            }
        } else {
            $db->CatchError("No user account found");
        }
    } else {
        $db->CatchError("Please make sure you use the correct email format, eg: example@email.co.za");
    }
}
