<?php 

$host = "localhost";
$username = "ocuser";
$password = "Pass@OC20";
$database = "onlinecourse";

$dbc = "mysql:host=$host;dbname=$database;charset=UTF8";

try {
    $dba = new PDO($dbc,$username,$password);
    $dba->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die($e->getMessage());
}