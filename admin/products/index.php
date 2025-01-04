<?php
require_once '../../config/database.php'; //đi lên 2 cấp từ thư mục hiện tại

$page = 1;
$perPage = 4;

if(isset($_GET['page'])) {
    $page = $_GET['page'];
}

$template = new Template();
$productModel = new Product();

$products = $productModel->getProductsByPage($page, $perPage);
$total = $productModel->getTotal();

$data = [
    'item' => 'Products Management',
    'title' => 'Trang san pham admin',
    'slot' => $template->render('products/list', ['products' => $products, 'perPage' =>  $perPage, 'total' =>  $total, 'page' => $page])
];
                                                                                                

$template->view('layout-admin', $data);

