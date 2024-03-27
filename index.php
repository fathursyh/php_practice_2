<?php
declare(strict_types=1);
session_start();

require_once __DIR__ . '/router.php'; 
require_once __DIR__ . '/home.php'; 


$router = new Router();

$router 
  ->get('/', [Home::class, 'index'])
  ->get('/invoices', ['index'])
  ->post('/invoices/create', ['invoices']);

echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));

