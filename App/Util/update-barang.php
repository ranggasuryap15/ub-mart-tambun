<?php

require_once (__DIR__ . "/../Class/Barang.php");
require_once (__DIR__ . "/../Util.php");
$barang = new Barang;
$util = new Util;

// update stok
if (isset($_POST['updateButton'])) {
    $kodeBarang = $_POST['kodeBarang'];
    $stokBarang = $_POST['stokBarang'];

    if ($kodeBarang != "" && isset($stokBarang)) {
        $result = $barang->updateStok($kodeBarang, $stokBarang);
        $errorStatus = "success";
        $errorMessage = "Berhasil update stok";

        if (!isset($result)) {
            header('location:../../dashboardkasir.php?p=barang');
        }
    } else {
        $errorMessage = "Gagal update stok";
        header('location:../../dashboardkasir.php?p=barang');
    }   
}
?>