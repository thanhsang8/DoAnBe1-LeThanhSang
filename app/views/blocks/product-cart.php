<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .big-card {
            margin-left: 500px;
        }

        .container {
            position: relative;
        }

        .btn {
            position: absolute;
            top: 5px;
            right: 10px;
        }
        .big-form
        {
        
            margin-left:-180px;
        }
        .small-form {
            margin-left: 20px;
        }

        /* Thêm kiểu cho checkbox */
        .checkbox-container {
            display: flex;
            align-items: center;
        }

        .checkbox-container input {
            margin-left: 10px;
            transform: scale(1.5);
        }
    </style>
</head>

<body>
    <div class="container">
        <button type="button" class="btn btn-outline-dark">
            <?php
            if (isset($_SESSION["VVV"])) {
                $totalQuantity = 0; 
                foreach ($_SESSION["VVV"] as $product) {
                    $totalQuantity += $product['quantity'];
                }
                echo "Giỏ hàng: " . $totalQuantity;
            }
            ?>
        </button>
    </div>
    <button type="button" id="orderButton" class="btn btn-primary">Đặt hàng</button>


    <div class="big-form">
        <?php foreach ($products as $product) { ?>
            <div class="big-card card mb-3" style="max-width: 500px;">
                <div class="row g-0">
                    <!-- Thêm ô kiểm vào mỗi thẻ sản phẩm -->
                    <div class="col-md-1 checkbox-container">
                        <input type="checkbox" class="product-checkbox" name="selectedProducts[]" value="<?php echo $product['id']; ?>">
                    </div>
                    <div class="col-md-4">
                        <img src="public/images/<?php echo $product['image'] ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product["name"]?></h5>
                            <p class="card-text"><?php echo $product["price"]?></p>
                            <!-- Form điều chỉnh số lượng -->
                            <form action="dieuchinhsoluong.php" method="post">
                                <input type="hidden" name="maSanPham" value="<?php echo $product['id']; ?>">
                                <div class="small-form">
                                    <div class="btn-group">
                                        <button type="submit" name="dieuChinh" value="giam" class="btn btn-outline-secondary">
                                            -
                                        </button>
                                        <span class="btn btn-outline-secondary disabled">
                                            <?php if (isset($product['quantity'])) { ?>
                                                <p class="card-text">Số lượng: <?php echo $product['quantity'] ?></p>
                                            <?php } ?>
                                        </span>
                                        <button type="submit" name="dieuChinh" value="tang" class="btn btn-outline-secondary">
                                            +
                                        </button>
                                    </div>
                                    <button type="submit" name="removeFromCart" class="btn btn-danger">
                                        Xóa
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- Thêm nút gửi để xử lý các sản phẩm đã chọn -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
    let selectedProductIds = [];

    // Thu thập các ID sản phẩm đã chọn
    const checkboxes = document.querySelectorAll('.product-checkbox');
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            const productId = this.value;

            if (this.checked) {
                selectedProductIds.push(productId);
            } else {
                selectedProductIds = selectedProductIds.filter(id => id !== productId);
            }
        });
    });

    // Xử lý sự kiện khi bấm nút "Đặt hàng"
    const orderButton = document.getElementById('orderButton');
    orderButton.addEventListener('click', function () {
        if (selectedProductIds.length > 0) {
            window.location.href = 'dathang.php?selectedProducts=' + selectedProductIds.join(',');
        } else {
            alert('Vui lòng chọn ít nhất một sản phẩm để đặt hàng.');
        }
    });
});

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
