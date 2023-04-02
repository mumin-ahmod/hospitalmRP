<?php

$hn = 'localhost';
$db = 'hospitalmdb';
$un = 'root';
$pw = '';


$pdo = new PDO("mysql:host=$hn; dbname=$db", "$un", "$pw");

    $output = 'Database connection established.';


?>