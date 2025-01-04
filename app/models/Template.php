<?php
class Template
{
    public function view ($view, $data = []) {
        extract($data); //chuyen doi mang data thanh cac bien tuong ung vs moi phan tu
                        //nếu có key thì khi mảng liên kết lồng extract ra mảng liên kết đơn thì tên mảng lkd sẽ lấy theo tên mảng lkl
        include BASE_PATH . 'app/views/' . $view . '.php';
    }

    public function render ($view, $data = []) {
        ob_start(); //doc file ben duoi va luu file

        extract($data); 
        include BASE_PATH . 'app/views/blocks/' . $view . '.php';

        return ob_get_clean(); //doc file ra va tra ve 1 chuoi va xoa file
    }
}