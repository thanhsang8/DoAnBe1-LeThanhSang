<style>
    .page-item a.page-link:hover {
        background-color: #007bff;
        color: #fff;
    }

    .page-item.disabled span.page-link {
        cursor: not-allowed;
    }
    .td {
        font-weight: bold;
        font-size: 1.5rem;
    }
    .item-name {
        font-weight: bold;
        font-size: 1.5rem;
    }
    .item-price {
        font-weight: 600;
    }
</style>


<div class="container py-5">
    <!-- Thông báo delete -->
    <?php
        if (isset($_SESSION['alertDelete'])) :
    ?>
        <div class="alert alert-success" role="alert" id="alertMessage">
            <?php echo $_SESSION['alertDelete'] ?>
        </div>
    <?php
        session_unset();
        endif;
    ?>
    <script>
    setTimeout(function () {
        document.getElementById('alertMessage').remove();
    }, 3000);
    </script>

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
                        <form action="destroy.php?page=<?php echo $page ?>" method="post" onsubmit="return confirm('Bạn có chắc là muốn xóa không?')">
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

    <!-- Phân trang -->
    <nav aria-label="Page navigation example" class="py-5">
        <ul class="pagination justify-content-center">
            <!-- Previous -->
        <?php if ($page > 1) : ?>
            <li class="page-item">
                <a class="page-link" href="index.php?page=<?php echo $page - 1 ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php else : ?>
            <li class="page-item disabled">
                <span class="page-link" aria-hidden="true">&laquo;</span>
            </li>
        <?php endif; ?>
        <!-- Các trang -->
     <?php
     $pages = ceil($total / $perPage);
     ?>
        <?php for ($i = 1; $i <= $pages; $i++) : ?>
            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                <a class="page-link " href="index.php?page=<?php echo $i ?>"><?php echo $i ?></a>
            </li>
        <?php endfor; ?>
    <!-- next -->
        <?php if ($page < $pages) : ?>
            <li class="page-item">
                <a class="page-link" href="index.php?page=<?php echo $page + 1 ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php else : ?>
            <li class="page-item disabled">
                <span class="page-link" aria-hidden="true">&raquo;</span>
            </li>
        <?php endif; ?>
        </ul>
    </nav>

</div>