<?php

require_once (__DIR__ . "/../Class/LaporanPenjualan.php");
require_once (__DIR__ . "/../Util.php");
$laporanPenjualan = new LaporanPenjualan;
$util = new Util;

// update stok
if (isset($_POST['btnTambah'])) {
    $kodeBarang = $_POST['kodeBarangTransaksi'];
    $namaBarang = $_POST['namaBarangTransaksi'];
    $hargaBarang = $_POST['hargaTransaksi'];
    $kuantitas = $_POST['qtyTransaksi'];
    $subTotal = $_POST['subTotalTransaksi'];

    if (!empty($kodeBarang) && $kuantitas != 0) {
        $result = $laporanPenjualan->insertTransaksiTemp($kodeBarang, $namaBarang, $hargaBarang, $kuantitas, $subTotal);
        $errorStatus = "success";
        $errorMessage = "Berhasil update stok";

        if (!isset($result)) {
            header('location:../../index.php?p=transaksi');
        }
    } else {
        $errorMessage = "Gagal update stok";
        header('location:../../index.php?p=transaksi');
    }   
}
?>