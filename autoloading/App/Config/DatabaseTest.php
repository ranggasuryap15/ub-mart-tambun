<?php
require_once __DIR__ . '/Database.php';

$db = new \Config\Database;
$db->connect();

echo "Sukses Membuat Koneksi" . PHP_EOL;