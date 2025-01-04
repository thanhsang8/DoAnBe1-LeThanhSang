<?php
require_once 'config/database.php';
$productmodelCategory = new Category();
$categories = $productmodelCategory->getAllCategories();

// Kiểm tra xem có tham số 'id' được truyền vào không
if (isset($_GET['idDeleteFavourite'])) {
    $productIdToRemove = $_GET['idDeleteFavourite'];

    // Tìm vị trí của sản phẩm trong danh sách yêu thích
    $indexToRemove = array_search($productIdToRemove, $_SESSION['favourite_products']);

    // Nếu sản phẩm có tồn tại trong danh sách, hãy xóa nó
    if ($indexToRemove !== false) {
        unset($_SESSION['favourite_products'][$indexToRemove]);
    }
}

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Kiểm tra xem sản phẩm đã được thêm vào yêu thích chưa
    if (!isset($_SESSION['favourite_products'])) {
        $_SESSION['favourite_products'] = [];
    }

    if (!in_array($productId, $_SESSION['favourite_products'])) {
        // Thêm ID vào danh sách yêu thích nếu chưa tồn tại
        $_SESSION['favourite_products'][] = $productId;
    }
}

$productModel = new Product();
$products = []; // Khởi tạo mảng sản phẩm

if (isset($_SESSION['favourite_products'])) {
    $favouriteProductIds = $_SESSION['favourite_products'];

    foreach ($favouriteProductIds as $productId) {
        $products[] = $productModel->getProductById($productId);
    }
}

// Sử dụng template để hiển thị danh sách sản phẩm yêu thích
$template = new Template();
//echo $template->render('favourite-product', ['products' => $products]);

$data = [
    'title' => 'Trang san pham admin',
    'slot' => $template->render('favourite-product', ['products' => $products,])
];
 $template->view('layout-one-product', $data);
?>
