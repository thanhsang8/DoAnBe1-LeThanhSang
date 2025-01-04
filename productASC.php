<?php
require_once 'config/database.php';

$page = 1;
$perPage = 8;

$products = [];
$template = new Template();
$productModel = new Product();
$sortOption = ''; // Biến lưu trữ thông tin sắp xếp

// Xử lý khi form sắp xếp được gửi đi
if ($_POST['action'] == 'sort') {
    if ($_POST['sort'] === 'asc') {
        $sortOption = 'asc';
    } elseif ($_POST['sort'] === 'desc') {
        $sortOption = 'desc';
    }
}

// Kiểm tra và lấy sản phẩm theo tùy chọn sắp xếp từ biến
if ($sortOption === 'asc') {
    $products = $productModel->ProductASC();
} elseif ($sortOption === 'desc') {
    $products = $productModel->ProductDESC();
}

$total = $productModel->getTotal();

$data = [
    'title' => 'Trang home',
    'slot' => $template->render('product-list', [
        'products' => $products,
        'sortOption' => $sortOption,  // Truyền thông tin sắp xếp qua view
        'perPage' => $perPage,
        'total' => $total,
        'page' => $page
    ]),
];

$template->view('layout', $data);
?>
