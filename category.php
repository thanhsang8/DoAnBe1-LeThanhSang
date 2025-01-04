<?php
require_once 'config/database.php';

// Lấy các sản phẩm thông qua id sau khi chọn mục 1 trên danh mục
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $productModel = new Product();
    $products = $productModel->getProductsByCategory($id);
}

$template = new Template();

$data = [
    'title' => 'Trang categories of product',
    'slot' => $template->render('categories-of-product', ['products' => $products])
];

$template->view('layout', $data);