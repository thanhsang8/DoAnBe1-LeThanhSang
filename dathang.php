<?php
require_once 'config/database.php';


$template = new Template();







$data = [
    'title' => 'Trang home',
    'slot' => $template->render('dat-hang', [

    ])
];

$template->view('layout', $data);




