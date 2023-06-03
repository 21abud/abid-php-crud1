<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_php_crud1');

$con= MYSQLI_CONNECT(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if(MYSQLI_CONNECT_ERRNO())
{
    echo "Failed to connect DB: " .MYSQLI_CONNECT_SERROR();
}
?>