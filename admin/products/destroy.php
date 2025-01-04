    <?php


    require_once '../../config/database.php';

if(isset($_GET['page'])) {
    $page = $_GET['page'];
}

    if (isset($_POST['productID'])) {
        $productID = $_POST['productID'];
        $productModel = new Product();

        if ($productModel->destroy($productID)) {
            $_SESSION['alertDelete'] = "Delete successfully!!!";
        } else {
            $_SESSION['alertDelete'] = "Delete failed!!!";
        }
    } else {
        echo "Product ID not set.";
    }
    header("location: http://localhost/be_shoeshe/admin/products/index.php?page=".$page );
