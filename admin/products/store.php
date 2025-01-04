<?php
require_once '../../config/database.php';
$productName = '';
$productPrice = '';
$productDescription = '';

if (isset($_POST['productName'])) {
    $productName = $_POST['productName'];
}
if (isset($_POST['productPrice'])) {
    $productPrice = $_POST['productPrice'];
}
if (isset($_POST['productDescription'])) {
    $productDescription = $_POST['productDescription'];
}
if (isset($_POST['categoriesID'])) {
    $categoriesID = $_POST['categoriesID'];
}


if (!empty($productName) && !empty($productPrice) && !empty($productDescription) && !empty($_FILES['productImage'])) {
    $productModel = new Product();

    $targetName = time() . '.' . pathinfo($_FILES['productImage']['name'], PATHINFO_EXTENSION);
    $target = '../../public/images/' . $targetName;

    if (is_uploaded_file($_FILES['productImage']['tmp_name']) && move_uploaded_file($_FILES['productImage']['tmp_name'], $target)) {
        if ($productModel->store($productName, $productPrice, $productDescription, $targetName, $categoriesID)) {
            header('location: http://localhost/be_shoeshe/admin/products/index.php');
        }
    }
}
