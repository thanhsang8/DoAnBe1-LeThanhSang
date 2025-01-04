<?php
require_once '../../config/database.php';

if (isset($_GET['productID'])) {
    $productID = $_GET['productID'];
    $productModel = new Product();
    $product = $productModel->getProductByIdWithCategory($productID);
}

$template = new Template();
$categoryModel = new Category();
$categories = $categoryModel->getAllCategories();


$data = [
    'item' => 'Edit a product',
    'title' => 'Edit a product',
    'slot' => $template->render('products/edit-form', ['categories' => $categories, 'product' => $product]) // extract ra thành các mảng kết đơn tên mặc định var
];

$template->view('layout-admin', $data);