<?php
declare(strict_types=1);
session_start();

require_once __DIR__ . '/router.php'; 
require_once __DIR__ . '/home.php'; 
require_once __DIR__ . '/invoices.php'; 


$router = new Router();
try {
  $db = new PDO('mysql:host=localhost; dbname=php_practice', 'root');
} catch(PDOException $e) {
  throw new \PDOException('KONEKSI DATABASE ERROR');
}

$router 
  ->get('/', [Home::class, 'index'])
  ->get('/invoices', [Invoices::class, 'invoice'])
  ->post('/invoices/create', []);

echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
$query = 'SELECT * FROM toko WHERE id = 2';
foreach($db->query($query) as $row) {
  echo $row['nama_barang'];
}