<?php
class Category extends Database
{
    // Lấy tất cả danh mục
    public function getAllCategories()
    {
        // 2. Tạo câu SQL
        $sql = parent::$connection->prepare('SELECT * FROM `categories`');
        return parent::select($sql);
    }
}
