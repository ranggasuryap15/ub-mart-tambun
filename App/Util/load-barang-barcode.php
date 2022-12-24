<?php 

require_once(__DIR__ . "/../Class/Barang.php");

$barang = new Barang;

$barang = $barang->readBarang();
$result = array();

foreach ($barang as $row) {
    array_push($result, array('kode_barang' => $row['kode_barang'], 
    'nama_barang' => $row['nama_barang'],
    'harga_jual' => $row['harga_jual'],
    'stok' => $row['stok']));
}

echo json_encode($result);