<style>
    .main-pr-name
    {
        color:black;
        text-decoration:none;
    }
</style>
<h2 class="text-center py-4 fw-bold">History</h2>
<div class="container py-5">
    <div class="row row-cols-1 row-cols-md-4 g-4">
    <?php
        foreach ($products as $product) :
        ?>
            <div class="col">
                <div class="card" style="height: 450px;">
                    <img src="public/images/<?php echo $product['image'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a class="main-pr-name" href="product.php?id=<?php echo $product['id'] ?>"><?php echo $product['name'] ?></a></h5>
                    </div>
                </div>
            </div>
            <?php
        endforeach
        ?>
    </div>
</div>