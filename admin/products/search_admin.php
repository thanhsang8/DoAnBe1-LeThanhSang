<?php
require_once '../../config/database.php';

if (isset($_GET['q'])) {
    $keyword = $_GET['q'];
    $productModel = new Product();
    $products = $productModel->search($keyword);
}

$template = new Template();

$data = [
    'item' => 'Seach Product',
    'title' => 'Trang san pham admin',
    'slot' => $template->render('products/admin_search_product', ['products' => $products])
];
                                                                                                

$template->view('layout-admin', $data);


