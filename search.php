<?php
require_once 'config/database.php';

if (isset($_GET['q'])) {
    $keyword = $_GET['q'];
    $productModel = new Product();
    $products = $productModel->search($keyword);
}

$template = new Template();

$data = [   
    'title' => $keyword,
    'slot' => $template->render('product-search', ['products' => $products])
];

$template->view('layout', $data);


