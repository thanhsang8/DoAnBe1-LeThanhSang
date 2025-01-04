<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['dieuChinh'])) {
        $productIdToAdjust = $_POST['maSanPham'];
        $adjustmentType = $_POST['dieuChinh'];

        // Find the product in the cart
        foreach ($_SESSION["VVV"] as $key => &$product) {
            if ($product['id'] == $productIdToAdjust) {
                // Adjust quantity based on the button clicked
                if ($adjustmentType === 'tang') {
                    $product['quantity']++;
                } elseif ($adjustmentType === 'giam') {
                    $product['quantity']--;
                }

                // Remove the product if quantity is zero
                if ($product['quantity'] <= 0) {
                    echo '<script>alert("Bạn có muốn loại bỏ sản phẩm khỏi giỏ hàng.");
                    window.location.href = "/be_shoeshe/cart.php";
                    </script>';
                    
                   unset($_SESSION["VVV"][$key]);
                    exit();
                }

                break;
            }
        }
    }
}
if (isset($_POST['removeFromCart'])) {
    $productIdToRemove = $_POST['maSanPham'];

    // Find the product in the cart and remove it
    foreach ($_SESSION["VVV"] as $key => $product) {
        if ($product['id'] == $productIdToRemove) {
            unset($_SESSION["VVV"][$key]);
            break;
        }
    }
}

header("Location: /be_shoeshe/cart.php");
exit();
