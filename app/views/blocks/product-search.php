<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        .main-pr-name
        {
            color:black;
        text-decoration:none;
        }
    </style>
</body>
</html>
<h2 class="text-center fw-bold py-3">Our Products</h2>
<div class="container py-5">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php
        foreach ($products as $product) :
        ?>
            <div class="col">
                <div class="card" style="height: 600px;">
                    <img src="public/images/<?php echo $product['image'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a class="main-pr-name" href="product.php?id=<?php echo $product['id'] ?>"><?php echo $product['name'] ?></a></h5>
                        <p><?php echo $product['price'] ?></p>
                        
                    </div>
                </div>
            </div>
        <?php
        endforeach
        ?>
    </div>
</div>