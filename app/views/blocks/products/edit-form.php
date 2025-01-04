<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
<script type="text/javascript">
  bkLib.onDomLoaded(function() {
        new nicEditor({maxHeight : 200}).panelInstance('productDescription');
  });
  </script>
<div class="container py-5">
    <form action="update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="productID" value="<?php echo $product['id'] ?>">
        <div class="mb-3">
            <label for="productName" class="form-label">Name</label>
            <input type="text" class="form-control" id="productName" name="productName" value="<?php echo $product['name'] ?>">
        </div>
        <div class="mb-3">
            <label for="productPrice" class="form-label">Price</label>
            <input type="text" class="form-control" id="productPrice" name="productPrice" value="<?php echo $product['price'] ?>">
        </div>
        <div class="mb-3">
            <label for="productDescription" class="form-label">Description</label>
            <textarea class="form-control" id="productDescription" name="productDescription"><?php echo $product['description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="productImage" class="form-label">Image</label>
            <input type="file" class="form-control" id="productImage" name="productImage" value="<?php echo $product['image'] ?>">
        </div>

        <?php
        $productCategories = explode(',', $product['category_id']); // cắt thành mảng
        foreach ($categories as $category) :
        ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="categoriesID[]" <?php echo in_array($category['id'], $productCategories) ? 'checked' : '' ?> value="<?php echo $category['id'] ?>" id="<?php echo $category['name'] ?>">
                <label class="form-check-label" for="<?php echo $category['name'] ?>">
                    <?php echo $category['name'] ?>
                </label>
            </div>
        <?php
        endforeach
        ?>

        <button style="display: block; margin: 0 auto;" type="submit" class="btn btn-primary mb-3 mt-5">Submit</button>
    </form>
</div>