<?php
require_once 'config/database.php';

$page = 1;
$perPage = 8;

if(isset($_GET['page'])) {
    $page = $_GET['page'];
}

$template = new Template();
$productModel = new Product();
//$products = $productModel->getAllProductsWithCategories();

$products = $productModel->getProductsByPage($page, $perPage);
$total = $productModel->getTotal();

$data = [
    'title' => 'Trang home',
    'slot' => $template->render('product-list', [
        'products' => $products,
        'perPage' => $perPage,
        'total' => $total,
        'page' => $page
    ])
];

$template->view('layout', $data);
?>
