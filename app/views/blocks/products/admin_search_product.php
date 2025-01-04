<div class="container py-5">
<table class="table">
        <thead>
            <tr>
                <td class="td">ID</td>
                <td class="td">Name</td>
                <td class="td">Price</td>
                <td class="td">Image</td>
                <td class="td">Action</td>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($products as $product) :
            ?>
                <tr>
                    <td class="align-middle"><?php echo $product['id'] ?></td>
                    <td class="align-middle item-name"><?php echo $product['name'] ?></td>
                    <td class="align-middle item-price"><?php echo $product['price'] ?></td>
                    <td class="align-middle"><img src="../../public/images/<?php echo $product['image'] ?>" alt="Image" width="100px"></td>
                    <td class="align-middle">
                    <div class="d-flex gap-2 align-items-center">
                        <a href="edit.php?productID=<?php echo $product['id'] ?>" class="btn btn-warning">Edit</a>
                        <form action="destroy.php" method="post">
                            <button type="submit" class="btn btn-danger" name="productID" value="<?php echo $product['id'] ?>">Delete</button>
                        </form>
                       </div>
                    </td>
                </tr>
            <?php
            endforeach
            ?>
        </tbody>
    </table>
</div>