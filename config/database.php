<?php
session_start();
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_shoeshe');
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/be_shoeshe/');

spl_autoload_register(function ($className) {
    require_once BASE_PATH . "app/models/$className.php";
});