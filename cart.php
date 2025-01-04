<?php
require_once 'config/database.php';


$_SESSION["AAA"]="kkk";
$productModel = new Product();
$products = [];

if (!empty($_POST["product-id"]) && !empty($_POST["product-img"]) && !empty($_POST["product-name"]) && !empty($_POST["product-price"]) && !empty($_POST["product-desciption"])) {
    $id=$_POST["product-id"];
    $img = $_POST["product-img"];
    $name = $_POST["product-name"];
    $price = $_POST["product-price"];
    $description = $_POST["product-desciption"];
    
    // $product = [
    //     'id' = > $id,
    //     'image' => $img,
    //     'name' => $name,
    //     'price' => $price,
    //     'description' => $description
    // ];
   
  $productExists = false;
  if (isset($_SESSION["VVV"])) {
      foreach ($_SESSION["VVV"] as &$existingProduct) {
          if ($existingProduct['id'] == $id) {
              $productExists = true;
              // Increment the quantity by 1 if the product already exists
              $existingProduct['quantity'] += 1;
              break;
          }
      }
  }

  if ($productExists) {
      echo '<script>
      alert("Thêm sản phẩm thành công!");
           window.location.href = "/be_shoeshe/cart.php?id=' . $id . '";
      </script>';
  } else {
      $product = [
          'id' => $id,
          'image' => $img,
          'name' => $name,
          'price' => $price,
          'description' => $description,
          'quantity' => 1  // Set initial quantity to 1 for a new product
      ];
      $_SESSION["VVV"][] = $product; // Save the product to the session array
      $_SESSION["AAA"] = "AAA";
      echo '<script>
           alert("Thêm sản phẩm thành công!");
           window.location.href = "/be_shoeshe/cart.php?id=' . $id . '";
      </script>';
  }
    
}
?>
<?php
if($_SESSION["AAA"]="kkk" && !isset($_SESSION["VVV"]))
{
    echo "Chưa Có Sản Phẩm Nào Trong Giỏ Hàng";
}
?>
<?php
if(isset($_SESSION["VVV"]))
{
    $template = new Template();

$data = [
    'title' => 'Trang Gio Hang',
    'slot' => $template->render('product-cart', ['products' => isset($_SESSION["VVV"]) ? $_SESSION["VVV"] : []]) 
];
$template->view('layout-one-product', $data);   
}
?>