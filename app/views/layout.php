<?php
    $categoryModel = new Category();
    $categories = $categoryModel->getAllCategories();

    if (!isset($_SESSION['login'])) {
        $_SESSION['login'] = 'Login';
    } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php
            if (!empty($title)) {
                echo $title;
            }
    ?></title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/all.min.css">
    <link rel="stylesheet" href="public/css/all.css">
    <link rel="stylesheet" href="public/css/styles_index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<style>
    .d-flex button {
        border: none; /* Loại bỏ viền */
        background-color: transparent;
        cursor: pointer; /* Thêm hiệu ứng con trỏ khi rê chuột vào button */
    }
    .icon-footer {
        color: white;
        font-size: 2rem;
    }

    button {
        color: #000;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .search-button {
        background: white;
        color: #000;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-left: -30px;
    }
    .footer
    {
        margin-top:30px;
    }
</style>
<body>
    <!-- header -->
    <header class="top-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg nav-header">
                <a class="navbar-brand mx-3" href="/be_shoeshe/index.php"><img src="public/img/logo.png" alt="ShoesHe" width="100px"> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fs-5">
                        <?php
                        foreach ($categories as $category) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="category.php?id=<?php echo $category['id'] ?>"><?php echo $category["name"]; ?></a>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php"><?php echo $_SESSION['login']?></a>
                        </li>
                    </ul>
                </div>
                <!-- search -->
                <form class="ms-auto d-flex" action="search.php" method="get" onsubmit="redirectToSearch()">
                    <input class="form-control rounded-pill input-search" type="search" placeholder="Search" aria-label="Search" name="q">
                    <button class="my-2" type="submit" style="margin-left: -30px; border: none; outline: none; background-color: white;">
                        <i class="bi bi-search icon-a"></i>
                    </button>
                </form>

                <script>
                    function redirectToSearch() {
                        window.location.href = 'http://undersized-guys.000.webhostapp.com';
                        return false; 
                    }
                </script>

                <div class="d-flex mx-2 gap-2">
                    <!-- cart -->
                <form action="cart.php" method="get">
                    <button type="submit"><i class="bi bi-cart4"></i></button>
                </form>
                <!-- history -->
                <form action="history.php" method="get">
                    <button type="submit"><i class="bi bi-clock-history"></i></button>
                </form>
                <!-- favourite -->
                <form action="favourite.php" method="get">
                    <button type="submit"><i class="bi bi-heart"></i></button>
                </form>
                <form action="chatwithshop.php" method="get">
                        <button type="submit"><i class="bi bi-chat-left-dots"></i></button>
                </form>
                </div>

            </nav>
        </div>
           <!-- banner -->
           <div class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 py-5">
                        <h1 class="px-5 pt-5 header-banner">Welcome to ShoesHe!!!</h1>
                        <p class="px-5 paragrab-banner" >Confident Steps, Infinite Style: ShoesHe - Where Elegance Blends
                            with Comfort.</p>
                    </div>
                    <div class="col-sm-7">
                        <img src="public/img/banner.png" alt="Banner" class="px-5">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php
    if (!empty($slot)) {
        echo $slot;
    }
    ?>

<footer class="footer bg-dark text-white  py-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <a href="http://localhost:82/be_shoeshe/"><img src="public/img/logo.png" alt="ShoesHe" width="200px"></a>
                </div>
                <div class="col-sm-4 my-auto  ">
                    <div class="d-flex justify-content-center gap-3">
                        <a href="#"><i class="bi bi-twitter icon-footer"></i></a>
                        <a href="#"><i class="bi bi-facebook icon-footer"></i></a>
                        <a href="#"><i class="bi bi-instagram icon-footer"></i></a>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4 my-auto">
                    <p class="text-center mt-3">&copy; 2024 ShoesHe. All rights reserved. | Designed by ShoesHe Company
                    </p>
                </div>

            </div>
        </div>
    </footer>
</body>
</html>