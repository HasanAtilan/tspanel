<?php
$server = 'localhost'; // ellemeyin!
$username = 'DB KULLANİCİ ADİ';
$password = 'DB SİFRE';
$database = 'DB SİFRESİ';

try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "Bağlantı sağlanamadı: " . $e->getMessage());
}