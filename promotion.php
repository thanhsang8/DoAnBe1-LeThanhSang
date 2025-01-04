<?php
require_once 'config/database.php';
$template = new Template();
$productModel = new Product();

$products = $productModel->RanDomProducts();    

$data = [
    'title' => 'Trang home',
    'slot' => $template->render('product-promotion', [
        'products' => $products,
    ])
];

$template->view('layout', $data);
?>
