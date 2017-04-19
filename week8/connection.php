<?php
$dsn = 'mysql:host=localhost;dbname=nukim-php2017_test1';
$db = new PDO($dsn, 'nukim-php2017', 'nuk!m');
$db->exec('SET CHARACTER SET UTF-8');
$db->exec('SET NAMES UTF-8');
?>

