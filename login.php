<?php
$title = "Just Bike Tyre | Login";
include_once("includes/header.php");
include_once("includes/process_login.php");
?>
<div class="login_wrapper d-flex justify-content-center align-items-center">
    <div class="card login_card">
        <div class="card-body">
            <div class="card_logo">
                <img src="images/logo.png" alt="Just Bike Tyre Logo">
            </div>
            <h3 class="text-center">Log in</h3>
            <p class="card-text text-center">New to JustBikeTyre? <a href="register.php">Sign up</a></p>
            <?php
            if (isset($_SESSION["ERROR_MESSAGE"]) && $_SESSION["ERROR_MESSAGE"] != "") {
            ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION["ERROR_MESSAGE"] ?>
                </div>
            <?php
            }
            ?>
            <form action="login.php" method="POST">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="btn btn-primary w-100 mt-3" name="submit">Log In</button>
            </form>
        </div>
    </div>
</div>

<?php
$hide_footer = true;
include_once("includes/footer.php");
?>