<?php
$databaseName = 'ASAMSOM_labs';
$dsn = 'mysql:host=webdb.uvm.edu;dbname=' . $databaseName;
$username = 'asamsom_writer';
$password = '6rB7ulvKu8rC';

$pdo = new PDO($dsn, $username, $password);
?>
