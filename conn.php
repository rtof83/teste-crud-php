<?php

define("DB_HOST", "localhost");
define("DB_USER", "user");
define("DB_PASS", "password");
define("DB_NAME", "database");

$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset-utf8mb4", DB_USER, DB_PASS);

?>
