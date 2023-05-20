
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
                RRMM
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.php">Shop</a>
                        </li>

                    </ul>
                </div>


                <a class="nav-icon position-relative text-decoration-none" href="cart.php">
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    <span id="cartCount" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-light text-dark"><?php if (isset($_SESSION['cart'])) : ?>
                    <?php echo count($_SESSION['cart']); ?>
                    <?php endif; ?></span>
                    </a>
            </div>
        </div>
    </nav>
    <!-- Close Header -->