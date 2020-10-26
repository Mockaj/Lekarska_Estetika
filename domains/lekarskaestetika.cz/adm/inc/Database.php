<?php

error_reporting(E_ALL | E_STRICT);

require_once 'NotORM.php';

define('DB_HOST', 'md25.wedos.net');
define('DB_USER', 'w193493_le');
define('DB_CHARSET', 'UTF8');
define('DB_PASSWORD', 'uhUTq69H');
define('DB_NAME', 'd193493_le');
define('DB_DEBUG', false);
define('DB_CACHE', TRUE);
define('DNS', "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET . ";");

$conn = null;
$database = null;
$cache = null;


$conn = new PDO(DNS, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));


$database = new NotORM($conn, NULL, $cache);
?>