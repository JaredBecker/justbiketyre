<?php
$title = "Just Bike Tyre | Register";
include_once("includes/header.php");
include_once("includes/process_registration.php");
?>
<div class="login_wrapper d-flex justify-content-center align-items-center">
    <div class="card login_card">
        <div class="card-body">
            <div class="card_logo">
                <img src="images/logo.png" alt="Just Bike Tyre Logo">
            </div>
            <h3 class="text-center">Sign Up</h3>
            <p class="card-text text-center">Already have an account? <a href="login.php">Log in</a></p>
            <?php
            if (isset($_SESSION["ERROR_MESSAGE"]) && $_SESSION["ERROR_MESSAGE"] != "") {
                ?>
                <div class="alert alert-danger">
                    <?php echo  $_SESSION["ERROR_MESSAGE"] ?>
                </div>
                <?php
            }
            ?>
            <form action="" method="POST">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingName" name="full_name" placeholder="Joe Doe">
                    <label for="floatingName">Full Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingCompany" name="company" placeholder="Just Bike Tyre">
                    <label for="floatingBusiness">Company Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button name="submit" class="btn btn-primary w-100 mt-3">Register!</button>
            </form>
        </div>
    </div>
</div>
<?php
$hide_footer = true;
include_once("includes/footer.php");
?>