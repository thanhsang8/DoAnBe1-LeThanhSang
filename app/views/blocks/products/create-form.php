<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
  <script type="text/javascript">
  bkLib.onDomLoaded(function() {
        new nicEditor({maxHeight : 200}).panelInstance('productDescription');
  });
  </script>
</head>
<body>
    
</body>
</html>
<div class="container">
   
    <form action="store.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="productName" class="form-label">Name</label>
            <input type="text" class="form-control" id="productName" name="productName">
        </div>
        <div class="mb-3">
            <label for="productPrice" class="form-label">Price</label>
            <input type="text" class="form-control" id="productPrice" name="productPrice">
        </div>
        <div class="mb-3">
            <label for="productDescription" class="form-label">Description</label>
            <textarea class="form-control" id="productDescription" name="productDescription"></textarea>
        </div>
        <div class="mb-3">
            <label for="productImage" class="form-label">Image</label>
            <input type="file" class="form-control" id="productImage" name="productImage">
        </div>

        <?php
        foreach ($categories as $category) :
        ?>
        <!-- gửi value đi dưới dạng 1 mảng có key là categoryID -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="categoriesID[]" value="<?php echo $category['id'] ?>" id="<?php echo $category['name'] ?>"> 
                <label class="form-check-label" for="<?php echo $category['name'] ?>">
                    <?php echo $category['name'] ?>
                </label>
            </div>
        <?php
        endforeach
        ?>
        <button style="display: block; margin: 0 auto;" type="submit" class="btn btn-primary mt-3 mb-3">Submit</button>
    </form>
</div>