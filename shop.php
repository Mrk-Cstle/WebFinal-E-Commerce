<!DOCTYPE html>
<html lang="en">
<?php include "assets/include/session.php" ?>

<head>
    <title>RRMM - Product Listing Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>

    <!-- Close Top Nav -->


    <!-- Header -->
    <?php include 'assets/include/nav.php'; ?>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-4">Categories</h1>
                <ul class="list-unstyled templatemo-accordion">
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Gender
                            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul class="collapse show list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Men</a></li>
                            <li><a class="text-decoration-none" href="#">Women</a></li>
                        </ul>
                    </li>


                </ul>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#">All</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#">Men's</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none" href="#">Women's</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 pb-4">
                        <div class="d-flex">
                            <select class="form-control">
                                <option>Top Selling</option>
                                <option>A to Z</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="assets/img/jordanUnion.jpg">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="shop-single.html"><i class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="far fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="shop-single.html" class="h3 text-decoration-none">Jordan 4 Guava</a>

                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>Size 7-12 Mens and Womens</li>
                                    <a id="cartBtn" href="shop.php?pro_id=1" class="shop_btn btn btn-success">Add to Cart</a>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">$250.00</p>
                            </div>
                        </div>
                    </div>

                    <?php
                    include 'login/include/selectDb.php';
                    ?>
                    <h3>Product List</h3>
                    <table>
                        <tr>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Description</th>
                        </tr>
                        <?php
                        if (mysqli_num_rows($resultProd) > 0) {

                            while ($row  = $resultProd->fetch_assoc()) {

                        ?>
                                <div class="col-md-4">
                                    <div class="card mb-4 product-wap rounded-0">
                                        <div class="card rounded-0">
                                            <img class="card-img rounded-0 img-fluid" src="login/uploads/<?= $row['file_path'] ?>">
                                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">

                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <a href="shop-single.html" id="cartBtn" class=" h3 text-decoration-none"><?php echo $row['fname']; ?></a>
                                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                                <li><?php echo $row['brand']; ?></li>
                                                <a href="shop.php?pro_id=qwe" data-value="shop.php?pro_id=3" id="cartBtn" class="btn btn-success">Add to Cart</a>
                                                <li class="pt-2">
                                                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                                </li>
                                            </ul>

                                            <p class="text-center mb-0">$ <?php echo $row['price']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <tr>
                                    <td><img src="uploads/<?= $row['file_path'] ?>"></td>
                                    <td><?php echo $row['product_id']; ?></td>
                                    <td><?php echo $row['fname']; ?></td>
                                    <td><?php echo $row['brand']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo $row['info']; ?></td>
                                    <td><a href="createStaffDelete.php?id=<?php echo $row['product_id']; ?>">Remove</a></td>

                                </tr>




                        <?php
                            }
                            echo "</table>";
                        } else {
                            echo "<tr><td>" . "0 result" . "</td><td></table>";
                        }
                        ?>

                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0 img-fluid" src="assets/img/AdidasSamba.png">
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                            <li><a class="btn btn-success text-white" href="shop-single.html"><i class="far fa-heart"></i></a></li>
                                            <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="far fa-eye"></i></a></li>
                                            <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="fas fa-cart-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="shop-single.html" class="h3 text-decoration-none">Adidas Samba</a>
                                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                        <li>Size 6-12 Mens and Womens</li>
                                        <li class="pt-2">
                                            <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-center mb-1">
                                        <li>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-warning fa fa-star"></i>
                                            <i class="text-muted fa fa-star"></i>
                                            <i class="text-muted fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <p class="text-center mb-0">$250.00</p>
                                </div>
                            </div>
                        </div>





                </div>
                <div div="row">
                    <ul class="pagination pagination-lg justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="#">2</a>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- End Content -->




    <!-- Start Footer -->
    <?php
    include 'assets/include/footerS.php'
    ?>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(i) {
            i.preventDefault
            $('#cartBtn').click(function(e) {
                e.preventDefault();

                var myValue = $(this).data('value');
                $.ajax({
                    type: "POST",
                    url: "shop.php?pro_id=3",
                    data: {
                        myValue: myValue
                    },

                });
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        document.getElementById('cartCount').innerHTML = xhr.responseText;
                    }
                };
                xhr.open("GET", 'assets/include/asd.php', true);
                xhr.send();
            });

        });
    </script>
    <!-- <script>$('.shop_btn').click( function(e){e.preventDefault; return false;})</script> -->
    <!-- End Script -->
</body>

</html>