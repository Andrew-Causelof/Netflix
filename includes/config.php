<?php

 ob_start(); // включаем буферизацию /- кэширование
 session_start();

 date_default_timezone_set("Europe/Moscow");

try {
    $con = new PDO("mysql:dbname=netflix; host=localhost", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (PDOException $e) {
    exit("Connection failed: " . $e->getMessage());
}
?>