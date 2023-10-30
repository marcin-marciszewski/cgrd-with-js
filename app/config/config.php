<?php
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$rootUrl = $protocol . "://" . $host;

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'cgrd');
define('DB_PORT', '3306');
// App Root
define('APPROOT', dirname(dirname(__FILE__)));
// App Root
define('URLROOT', $rootUrl);
// App Root
define('SITENAME', 'CGRD');
