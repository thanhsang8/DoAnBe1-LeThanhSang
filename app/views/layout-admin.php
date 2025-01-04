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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/all.min.css">
    <link rel="stylesheet" href="../../public/css/all.css">
    <link rel="stylesheet" href="../../public/css/styles_index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<style>
.d-flex button {
    /* border: none; */
    /* Loại bỏ viền */
    /* background-color: transparent; */
    /* cursor: pointer; */
    /* Thêm hiệu ứng con trỏ khi rê chuột vào button */
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
</style>

<body>
    <!-- header -->
    <header class="top-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg nav-header">
                <a class="navbar-brand mx-3" href="/be_shoeshe/index.php"><img
                        src="../../public/img/logo.png" alt="ShoesHe" width="100px"> </a> <button class="navbar-toggler"
                    type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="text-center py-5 fw-bold mx-auto"><?php  if (!empty($item)) {
                echo $item;
            }  ?></h1>
                <div class="d-flex mx-2 gap-3">
                    <!-- search -->
                    <form class="ms-auto d-flex" action="search_admin.php" method="get" onsubmit="redirectToSearch()">
                        <input class="form-control rounded-pill input-search" type="search" placeholder="Search"
                            aria-label="Search" name="q">
                        <button class="my-2" type="submit"
                            style="margin-left: -30px; border: none; outline: none; background-color: white;">
                            <i class="bi bi-search icon-a"></i>
                        </button>
                    </form>

                    <script>
                    function redirectToSearch() {
                        window.location.href = 'http://undersized-guys.000.webhostapp.com/admin/products/';
                        return false;
                    }
                    </script>
                    <!-- create -->
                    <form action="create.php" method="get">
                        <button type="submit" class="mt-2"><i class="bi bi-plus-circle"></i></button>
                    </form>
                </div>
            </nav>
        </div>

        <?php
    if (!empty($slot)) {
        echo $slot;
    }
    ?>

        <footer class="bg-dark text-white  py-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <a href="#"><img src="../../public/img/logo.png" alt="ShoesHe" width="200px"></a>
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
                        <p class="text-center mt-3">&copy; 2023 ShoesHe. All rights reserved. | Designed by ShoesHe
                            Company
                        </p>
                    </div>

                </div>
            </div>
        </footer>
</body>

</html>