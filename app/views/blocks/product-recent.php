<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Sản phẩm vừa xem</h5>
        <ul>
            <?php
            foreach ($recentProducts as $recentProduct) :
            ?>
            <li><?php echo $recentProduct['name'] ?></li>
            <?php
            endforeach;
            ?>
        </ul>
    </div>
</div>