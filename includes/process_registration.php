<?php
if (isset($_POST["submit"])) {
    $user_details = [];
    $is_valid = true;
    $full_name = $_POST["full_name"];
    $company = $_POST["company"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    if ($full_name != "") {
        if (preg_match("/^([a-zA-Z' ]+)$/", $full_name)) {
            if (strlen($full_name) <= 50) {
                $user_details["full_name"] = $full_name;
            } else {
                $db->CatchError("Full name can not be longer than 50 characters");
                $is_valid = false;
            }
        } else {
            $db->CatchError("Full name can not contain special characters");
            $is_valid = false;
        }
    } else {
        $db->CatchError("Please fill out your full name");
        $is_valid = false;
    }

    if ($is_valid) {
        if (preg_match("/^([a-zA-Z0-9' ]+)$/", $company)) {
            if (strlen($company) <= 50) {
                $user_details["company"] = $company;
            } else {
                $db->CatchError("Company name can not be longer than 50 characters");
                $is_valid = false;
            }
        } else {
            $db->CatchError("Company name can not contain special characters");
            $is_valid = false;
        }
    }

    if ($is_valid) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $user_details["email"] = $email;
        } else {
            $db->CatchError("Please enter a valid email");
            $is_valid = false;
        }

        $user_details["password"] = $password;
        $user_details["approved"] = 0;

        $db->InsertNewUser($user_details);
    }
}
?>