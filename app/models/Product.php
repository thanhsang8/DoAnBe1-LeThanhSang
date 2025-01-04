<?php
class Product extends Database
{
    // Lấy tất cả sản phẩm
    public function getAllProducts()
    {
        // 2. Tạo câu SQL
        $sql = parent::$connection->prepare('SELECT * FROM `products`');
        return parent::select($sql);
    }
    public function getAllProductsOverPrice()
    {
        // 2. Tạo câu SQL
        $sql = parent::$connection->prepare('SELECT *
        FROM products
        WHERE price > 2000000');
        return parent::select($sql);
    }
    // Lấy danh sách sản phẩm bằng mảng id sản phẩm
    public function getAllProductsLessPrice()
    {
        // 2. Tạo câu SQL
        $sql = parent::$connection->prepare('SELECT *
        FROM products
        WHERE price < 2000000');
        return parent::select($sql);
    }

    // Lấy sp ngẫu nhiên
    public function RanDomProducts()
    {
        // 2. Tạo câu SQL
        $sql = parent::$connection->prepare('SELECT p.*, c.name AS category_name FROM products AS p INNER JOIN category_product AS cp ON p.id = cp.product_id INNER JOIN categories AS c ON cp.category_id = c.id ORDER BY RAND() LIMIT 3');
        return parent::select($sql);
    }

    // Sắp xếp
    public function ProductASC()
    {
        $sql = parent::$connection->prepare('SELECT * FROM `products` ORDER BY `price` ASC');
        return parent::select($sql);
    }
    public function ProductDESC()
    {
        $sql = parent::$connection->prepare('SELECT * FROM `products` ORDER BY `price` DESC');
        return parent::select($sql);
    }

    // Lấy tất cả sản phẩm có cùng danh mục
    public function getAllProductsSameCategory($id)
    {
       
        $sql = parent::$connection->prepare('SELECT p.id, p.name AS product_name, p.price, p.description, p.image, c.name AS category_name
        FROM products p
        JOIN category_product cp ON p.id = cp.product_id
        JOIN categories c ON cp.category_id = c.id
        WHERE cp.category_id = (SELECT category_id FROM category_product WHERE product_id = ?)');
        $sql->bind_param('i',$id);
        return parent::select($sql);
    }

    // Lấy sản phẩm theo số trang
    public function getProductsByPage($page, $perPage)
    {
        $start = ($page - 1) * $perPage;
        // 2. Tạo câu SQL
        $sql = parent::$connection->prepare('SELECT * FROM `products` LIMIT ?, ?');
        $sql->bind_param('ii', $start, $perPage);
        return parent::select($sql);
    }

    // Lấy tổng số tất cả sản phẩm
    public function getTotal()
    {
        // 2. Tạo câu SQL
        $sql = parent::$connection->prepare('SELECT COUNT(*) AS total FROM `products`');
        return parent::select($sql)[0]['total'];
    }

    // Lấy tất cả sản phẩm và danh mục
    public function getAllProductsWithCategories()
    {
        // 2. Tạo câu SQL
        $sql = parent::$connection->prepare('SELECT DISTINCT *, (
            SELECT GROUP_CONCAT(categories.id, "-", categories.name)
            FROM categories
            INNER JOIN category_product
            ON category_product.category_id = categories.id
            WHERE category_product.product_id = products.id) AS category_name
            FROM `products`;');
        return parent::select($sql);
    }

    // Lấy 1 sản phẩm theo id
    public function getProductById($id)
    {
        // 2. Tạo câu SQL
        $sql = parent::$connection->prepare('SELECT * FROM `products` WHERE `id`=?');
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }

    // Lấy 1 sản phẩm theo id và danh mục
    public function getProductByIdWithCategory($id)
    {
        // 2. Tạo câu SQL
        $sql = parent::$connection->prepare('SELECT products.*, GROUP_CONCAT(category_product.category_id) as category_id
        FROM `products` 
        INNER JOIN category_product
        ON category_product.product_id = products.id
        WHERE `id` = ?');
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }

    // Lấy 1 sản phẩm theo category id
    public function getProductsByCategory($id)
    {
        // 2. Tạo câu SQL
        // Kết id ở bảng products với product_id ở bản category_product ở tại cột có category_id = (id của bản categories được chọn)
        // Tóm lại là nó sẽ nhả ra các cái sản phẩm mà ở cùng hàng của với category_id
        // ON products.id = category_product.product_id  điều kiện để lấy sản phẩm và liên kết 2 bảng
        $sql = parent::$connection->prepare('SELECT *, (
                                            SELECT GROUP_CONCAT(categories.id, "-", categories.name)
                                            FROM categories
                                            INNER JOIN category_product
                                            ON category_product.category_id = categories.id
                                            WHERE category_product.product_id = products.id) AS category_name
                                            FROM products
                                            INNER JOIN category_product 
                                            ON products.id = category_product.product_id 
                                            WHERE category_product.category_id = ?');
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }

    // Trả về mảng 2 chiều các phần tử thỏa điều kiện của bản categories
    public function getNameProduct($id)
    {
        $sql = parent::$connection->prepare('SELECT *
                                            FROM categories
                                            INNER JOIN category_product 
                                            ON categories.id = category_product.category_id 
                                            WHERE category_product.product_id = ?');
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }

    // Search
    public function search($keyword)
    {
        $sql = parent::$connection->prepare('SELECT *, (
            SELECT GROUP_CONCAT(categories.id, "-", categories.name)
            FROM categories
            INNER JOIN category_product
            ON category_product.category_id = categories.id
            WHERE category_product.product_id = products.id) AS category_name
            FROM `products` 
            WHERE name LIKE ?');
        $likeParameter = '%' . $keyword . '%';
        $sql->bind_param('s', $likeParameter);
        return parent::select($sql);
    }

    // Store a product and category_product
    public function store($productName, $productPrice, $productDescription, $productImage, $categoriesID)
    {
        $sql = parent::$connection->prepare('INSERT INTO `products`(`name`, `price`, `description`, `image`) VALUES (?, ?, ?, ?)');
        $sql->bind_param('siss', $productName, $productPrice, $productDescription, $productImage);
        $sql->execute();

        // thêm vào category_product
        $insertedProduct = parent::$connection->insert_id; //lấy id sản phẩm vừa mới được chèn
        foreach ($categoriesID as $categoryID)
        {
            $sql = parent::$connection->prepare('INSERT INTO `category_product`(`category_id`, `product_id`) VALUES (?, ?)');
            $sql->bind_param('ii', $categoryID, $insertedProduct);
            $sql->execute();
        }
        return true;
    }

    // Update a product and category_product
    public function update($productName, $productPrice, $productDescription, $productImage, $productID, $categoriesID)
    {
        // Update a product
        $sqlUpdateProduct = parent::$connection->prepare('UPDATE `products` SET `name`=?, `price`=?, `description`=?, `image`=? WHERE `id`=?');
        $sqlUpdateProduct->bind_param('sissi', $productName, $productPrice, $productDescription, $productImage, $productID);
        $sqlUpdateProduct->execute();

        if(!empty($categoriesID))
        {
            // Xóa category_product cũ
            $sqlDeleteCategories = parent::$connection->prepare('DELETE FROM `category_product` WHERE `product_id`=?');
            $sqlDeleteCategories->bind_param('i', $productID);
            $sqlDeleteCategories->execute();

            // Thêm catefory_product mới
            foreach ($categoriesID as $categoryID)
            {
                $sqlInsertCategory = parent::$connection->prepare('INSERT INTO `category_product`(`category_id`, `product_id`) VALUES (?, ?)');
                $sqlInsertCategory->bind_param('ii', $categoryID, $productID);
                $sqlInsertCategory->execute();
            }
        }
        return true;
    }

    // Delate
    public function destroy($productID)
    {
        // Xóa product
        $sqlDeleteProduct = parent::$connection->prepare('DELETE FROM `products` WHERE `id`=?');
        $sqlDeleteProduct->bind_param('i', $productID);
        $sqlDeleteProduct->execute();

        // Xóa category_product
        $sqlDeleteCategoty_Product = parent::$connection->prepare('DELETE FROM `category_product` WHERE `product_id`=?');
        $sqlDeleteCategoty_Product->bind_param('i', $productID);
        return $sqlDeleteCategoty_Product->execute();
    }


}
