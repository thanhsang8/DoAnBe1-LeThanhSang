<?php
require_once 'config/database.php';
$template = new Template();
$productModel = new Product();

if (isset($_GET["price"]) && $_GET["price"] === "over") {
    $products = $productModel->getAllProductsOverPrice();
} elseif (isset($_GET["price"]) && $_GET["price"] === "less") {
    $products = $productModel->getAllProductsLessPrice();
}

$data = [
    'title' => 'Trang categories of product',
    'slot' => $template->render('product-filter', ['products' => $products])
];

$template->view('layout', $data);
?>
