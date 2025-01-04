<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .product-container {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        border-bottom: 1px solid #ccc;
        padding-bottom: 20px;
    }

    .product-image {
        width: 100px;
        height: 100px;
        object-fit: cover;
        margin-right: 20px;
    }

    .product-details {
        flex-grow: 1;
    }

    .product-name {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .product-price {
        color: green;
        font-size: 16px;
    }

    .delete-button {
        color: white;
        background-color: red;
        border: none;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin-left: auto;
        cursor: pointer;
    }
    </style>
</head>

<body>

    <h1 class="text-center py-2 fw-bold">Your Favourite Products</h1>
    <div class="container py-5">
        <?php
        foreach ($products as $product) :
        ?>
        <div class="product-container">
            <img src="public/images/<?php echo $product['image']; ?>" alt="Product Image" class="product-image">
            <div class="product-details">
                <div class="product-name"><?php echo $product['name']; ?></div>
                <div class="product-price"><?php echo $product['price']; ?></div>
            </div>
            <!-- Add delete button -->
            <a href="favourite.php?idDeleteFavourite=<?php echo $product['id']; ?>" class="delete-button">Delete</a>
        </div>
        <?php
        endforeach
        ?>
    </div>

</body>

</html>