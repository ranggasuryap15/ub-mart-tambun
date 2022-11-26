<?php 

require_once(__DIR__ . "/../Class/Barang.php");

$barang = new Barang;

$kodeBarang = "8901234775";
$barang = $barang->readBarang();
$result = array();

foreach ($barang as $row) {
    array_push($result, array('kode_barang' => $row['kode_barang'], 
    'nama_barang' => $row['nama_barang'],
    'harga_jual' => $row['harga_jual']));
}

// echo json_encode(array('data_barang' => $result));
echo json_encode($result);