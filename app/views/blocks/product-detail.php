<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-rbs5uRvTDBPdAu4gSXRIPZu6b7y9dGLYMTCwTpwPnmhca/XGnqD2d9FOICyojIm3" crossorigin="anonymous">
    <style>
        <style>
        .product-price
        {
            color : green;
        }
        .product-cham
        {
            color : blue;
        }
        .product-name
        {
          font-size:27px;
          font-weight: 700;
        }
       
        .container .item1
        {
          width: 450px;
          height: 450px;
        }
        .container .item2
        {
          margin-left:80px;
          width:500px;
          height:100px;
        }
        .product-btn
        {
         
          text-align:center;
        }
        .btn 
        {
          margin-top:20px;
          width:300px;
        }
        .product-available
        {
          text-align:center;
          margin-top:30px;
          opacity: 0.5;
        }
        .product-desciption
        {
          margin-top:20px;
        }
        .scroll-container {
        overflow-x: auto; /* Cho phép cuộn ngang */
        white-space: nowrap; /* Ngăn các sản phẩm xuống dòng */
        }

        /* Định dạng các sản phẩm */

       .sugest-product-title
       {
        text-align:center;
        margin-bottom:50px;
       }  
       .scroll-container
       {
      
        height: 450px;
        border: 1px solid #ddd;
        display: flex;
        overflow-x: auto;
       }
       .scroll-container::-webkit-scrollbar
       {
         width: 0;
       }
       .card
       {
        min-width:200px;
        height:370px;
       }
       .pr_name
       {
        text-decoration:none;
        font-weight: 500;
        color:black;
       }
       .product-price
       {
        font-size:17px;
        
       }
       .pr_categoryName
       {
        font-weight: 300;
       }
       .change-color-on-click {
            color: while`; 
        }

        .change-color-on-click.clicked {
            color: red; 
        }
    </style>
    </style>
</head>
<body>
<form action="cart.php" method="post">
    <div class="container py-5" style="display: flex; flex-direction: row;">
        <div class="item1">
            <img src="public/images/<?php echo $product["image"] ?>" alt="" class="img-fluid" style="width: 100%; max-width: 350px;">
        </div>
        <div class="item2">
            <h5 class="product-name"><?php echo $product["name"] ?></h5>
            <p class="product-price"><?php echo $product["price"]?></p>
            <!-- cart -->
            <div class="product-btn">
                <input type="hidden" name="product-id" value="<?php echo $product["id"] ?>">
                <input type="hidden" name="product-img" value="<?php echo $product["image"] ?>">
                <input type="hidden" name="product-name" value="<?php echo $product["name"] ?>">
                <input type="hidden" name="product-price" value="<?php echo $product["price"] ?>">
                <input type="hidden" name="product-desciption" value="<?php echo $product["description"] ?>">
                <input id="inp-cart" type="submit" class="btn btn-dark change-color-on-click" value="Add to Bag">
                <br>
                <!-- favourite -->
                <form action="favourite.php" method="get" id="favoriteForm">
                    <button type="button" class="btn btn-outline-dark favourite-btn" id="favouriteBtn" onclick="toggleFavourite()">
                        Favourite <i class="bi bi-heart-fill"></i>
                    </button>
                    <input type="hidden" name="idFavourite" value="<?php echo $product['id']; ?>">
                </form>
            </div>
            <p class="product-available">This product is excluded from site promotions and discounts</p>
            <p class="product-desciption"><?php echo $product["description"] ?></p>
        </div>
    </div>
</form>

<h1 class="sugest-product-title">You Might Also Like</h1>
<div class="scroll-container">
  <div class="container py-5">
    <div class="row row-cols-1 row-cols-md-5 g-5" id="productRow">
      <?php foreach ($productsSame as $productSame) : ?>
        <div class="col">
          <div class="card" style="height: 200px;">
            <img src="public/images/<?php echo $productSame['image'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h7 class="card-title1"><a class="pr_name" href="product.php?id=<?php echo $productSame['id'] ?>"><?php echo $productSame['product_name'] ?></a></h7>
              <p class="pr_categoryName"><?php echo $productSame['category_name'] ?></p>
               <p class="pr_price"><?php echo $productSame['price'] ?></p>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyIdFbF6f5C7J5r6Wo0dtw2TUCDxYXP5k" crossorigin="anonymous"></script>
<script>
    function toggleFavourite() {
        var favouriteBtn = document.getElementById('favouriteBtn');
        favouriteBtn.classList.toggle('text-danger');
        
        var productId = <?php echo $product['id']; ?>;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'favourite.php?id=' + productId, true);
        xhr.send();
    }
    var inputCart = document.getElementById('inp-cart');

// Thêm sự kiện click
inputCart.addEventListener('click', function() {
    inputCart.classList.add('clicked'); // Thêm class 'clicked' để thay đổi màu chữ
});
</script>
</html>
