<nav class="navbar sticky-top">
    <div class="container">
        <div class="row w-100">
            <div class="col-6 order-1 order-md-0 col-md-4 text-center d-flex align-items-center justify-content-center">
                <button type="button" class="btn btn-primary" onclick="toggleSideMenu()">
                    <i class="fas fa-bars" aria-hidden="true"></i>
                </button>
            </div>
            <div class="col-12 order-0 order-md-1 col-md-4 d-flex align-items-center justify-content-center">
                <a class="navbar-brand text-center" href="index.php">
                    <img src="images/logo.png" alt="Just Bike Tyre Logo">
                </a>
            </div>
            <div class="col-6 order-2 order-md-2 col-md-4 text-center d-flex align-items-center justify-content-center">
                <form action="index.php" method="POST">
                    <button class="btn btn-primary" name="logout">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>