<?php
require_once 'config/database.php';

// Kiểm tra xem cookie 'productHistory' có tồn tại không
if (isset($_COOKIE['productHistory'])) {
    $recentViewCookie = $_COOKIE['productHistory'];
    $recentView = json_decode($recentViewCookie, true);
} 
else
{
    $recentView = [];
}

$productModel = new Product();

// Duyệt qua mảng và lấy ID để lấy thông tin sản phẩm
$products = [];
foreach ($recentView as $productID) {
    $product = $productModel->getProductById($productID);
    $products[] = $product;
}

$template = new Template();

$data = [
    'title' => 'Trang lịch sử',
    'slot' => $template->render('history-product', ['products' => $products])
];

$template->view('layout-one-product', $data);
