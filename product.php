<?php
require_once 'config/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $productModel = new Product();
    $productsSame = $productModel->getAllProductsSameCategory($id);
    $product = $productModel->getProductById($id);
   
    

    // Lưu vào cookie để làm lịch sử
    $recentView = [];
    if (isset($_COOKIE['productHistory'])) {
        $recentView = json_decode($_COOKIE['productHistory']);

        if (!in_array($id, $recentView)) {
            if (count($recentView) == 10) {
                array_shift($recentView);
            }
            array_push($recentView, $id);
        }
    }
    else
    {
        array_push($recentView, $id);   
    }
    setcookie('productHistory', json_encode($recentView), time() + 3600*24);
}

$template = new Template();
$data = [
    'title' => 'Trang product detail',
    'slot' => $template->render('product-detail', ['product' => $product, 'productsSame'=>$productsSame ])
];

$template->view('layout-one-product', $data);