<style>
    .page-item a.page-link {
        transition: background-color 0.3s ease;
    }

    .page-item a.page-link:hover {
        background-color: #007bff;
        color: #fff;
    }

    .page-item.disabled span.page-link {
        cursor: not-allowed;
    }

    .main-pr-name {
        color: black;
        text-decoration: none;
        font-weight:500;
        font-size:20px;
    }

    .card-img-top {
        height: 350px;
        width:350px;
    }

    /*Xóa viền của thẻ card */
    .card {
        border: none;
        border-radius: 0;
    }
    .pr-categoryName
    {
        margin-top:-15px;
        color: #999;    
        font-weight:300;   
        font-size:20px;
    }
    .pr-price
    {
       margin-top:1px;
        margin-left:10px;
        color: #999;
        font-size:20px;
        text-decoration: line-through;
        
    }
    .pr-originalPrice
    {
        font-weight:500;
        font-size:20px;
    }
    .container-price
    {
        display:flex;
       
    }
    .pr-discount
    {
    margin-top:-10px;    
    font-size:17px;
     color:green;;
    }

</style>

<h2 class="text-center py-5 fw-bold">Discount For You</h2>

<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-3">
        <?php foreach ($products as $product) : ?>
            <div class="col">
                <div class="card" style="height: 600px;">
                    <img src="public/images/<?php echo $product['image'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <hp class="card-title">
                            <a class="main-pr-name" href="product.php?id=<?php echo $product['id'] ?>"><?php echo $product['name'] ?></a>
                        </p>
                        <?php $giaGoc = $product["price"]*30/100 ?>
                        <p class="pr-categoryName"><?php echo $product['category_name'] ?></p>
                       <div class="container-price">
                       <p class="pr-originalPrice"><?php echo $giaGoc?></p>
                        <p class="pr-price"> <?php echo $product['price'] ?></p>
                       </div>
                         <p class="pr-discount">15% off</p>   
                       
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
