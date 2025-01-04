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
    .form-select
    {
        width:140px;
        position: absolute;
        top:5px;
        right:70px;
    }
    .sort
    {
        position: relative; 
        padding-bottom:60px;
        margin-right: 45px;
    }
    .main-pr-name
    {
        color:black;
        text-decoration:none;
    }
    .promotion
    {
        text-decoration:none;
    }
    .wrap-promotion
    {
        margin-top:-80px;
        margin-left:1250px;
    }
    /* Reset default styles for radio buttons */
.custom-radio input[type="radio"] {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    display: inline-block;
    width: 20px;
    height: 20px;
    padding: 0;
    margin-right: 5px;
    margin-left: 40px;
    position: relative;
    border: 1px solid #888;
    border-radius: 50%;
    outline: none;
}

/* Define custom styles for checked radio buttons */
.custom-radio input[type="radio"]:checked::before {
    content: '';
    display: block;
    width: 12px;
    height: 12px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #007bff;
    border-radius: 50%;
}


.custom-radio label {
    display: inline-block;
    cursor: pointer;
    font-size: 16px;
    vertical-align: middle;
    margin-bottom: 10px;
}


.custom-radio label:hover {
    color: #007bff;
}

.custom-radio
{
    margin-bottom:-60px;
    margin-left:50px;
}
</style>

<h2 class="text-center py-5 fw-bold">Our Products</h2>


<form id="radioForm" class="custom-radio">
    <div class="form-check">
        <input type="radio" id="overPrice" name="price" value="overPrice">
        <label for="overPrice">Cao hơn 2,000,000.</label>
    </div>
    <div class="form-check">
        <input type="radio" id="lessPrice" name="price" value="lessPrice">
        <label for="lessPrice">Thấp hơn 2,000,000.</label>
    </div>
</form>


 <!-- <div class="wrap-promotion">
 <button type="button" class="btn btn-primary">
    <a class="text-white text-decoration-none" href="promotion.php">Sản phẩm ưu Đãi</a>
</button>
 </div> -->
<div class="sort">
<form action="productASC.php" method="post">
    <select name="sort" id="sort" class="form-select" onchange="hideFirstOption(); this.form.submit()">
    <option value="Rong" disabled selected hidden>Sắp Xếp</option>
        <option value="asc">Giá tăng dần</option>
        <option value="desc">Giá giảm dần</option>
    </select>
    <input type="hidden" name="action" value="sort">
</form>
</div>

<div class="container">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php
        foreach ($products as $product) :
        ?>
            <div class="col">
                <div class="card" style="height: 500px;">
                    <img src="public/images/<?php echo $product['image'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class=" card-title"><a class="main-pr-name" href="product.php?id=<?php echo $product['id'] ?>"><?php echo $product['name'] ?></a></h5>
                        <p><?php echo $product['price'] ?></p>
                    </div>
                </div>
            </div>
        <?php
        endforeach
        ?>
    </div>

<!-- phan trang -->
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
        <!-- các trang -->
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
<script>
    function hideFirstOption() {
        var select = document.getElementById("sort");
        select.options[0].style.display = "none"; // Ẩn tùy chọn đầu tiên
        select.onchange = null; // Ngừng lắng nghe sự kiện onchange để không gửi yêu cầu mỗi khi chọn
    }
    const radioForm = document.getElementById("radioForm");

// Bắt sự kiện thay đổi trạng thái của radio button
radioForm.addEventListener('change', function(event) {
    const selectedValue = event.target.value;

    // Kiểm tra giá trị của radio button được chọn và chuyển hướng người dùng
    if (selectedValue === "overPrice") {
        window.location.href = "filter.php?price=over"; // Chuyển hướng đến trang filter.php với tham số price=over
    } else if (selectedValue === "lessPrice") {
        window.location.href = "filter.php?price=less"; // Chuyển hướng đến trang filter.php với tham số price=less
    }
});
    
</script>