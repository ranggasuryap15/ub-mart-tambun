<?php

require_once (__DIR__ . "/../Class/Transaksi.php");
require_once (__DIR__ . "/../Util.php");
$laporanPenjualan = new Transaksi;
$util = new Util;

$kodeBarang = $_POST['kodeBarangTransaksi'];
$namaBarang = $_POST['namaBarangTransaksi'];
$hargaBarang = $_POST['hargaTransaksi'];
$kuantitas = $_POST['qtyTransaksi'];
$subTotal = $_POST['subTotalTransaksi'];

// update stok
if (isset($_POST['btnTambah'])) {
    if (!empty($kodeBarang) && $kuantitas != 0) {
        $result = $laporanPenjualan->insertTransaksiTemp($kodeBarang, $namaBarang, $hargaBarang, $kuantitas, $subTotal);
        $errorStatus = "success";
        $errorMessage = "Berhasil tambah transaksi";

        if (!isset($result)) {
            header('location:../../index.php?p=transaksi');
        }
    } else {
        $errorMessage = "Gagal tambah transaksi";
        header('location:../../index.php?p=transaksi');
    }
} else if (isset($_POST['btnUpdate'])) {
    if (!empty($kodeBarang) && $kuantitas != 0) {
        $result = $laporanPenjualan->updateTransaksiTemp($kodeBarang, $hargaBarang, $kuantitas);
        $errorStatus = "success";
        $errorMessage = "Berhasil update transaksi";

        if (!isset($result)) {
            header('location:../../index.php?p=transaksi');
        }
    } else {
        $errorMessage = "Gagal tambah transaksi";
        header('location:../../index.php?p=transaksi');
    }   
} else if (isset($_POST['btnDelete'])) {
    if (!empty($kodeBarang)) {
        $result = $laporanPenjualan->deleteTransaksiTemp($kodeBarang);
        $errorStatus = "success";
        $errorMessage = "Berhasil hapus transaksi";

        if (!isset($result)) {
            header('location:../../index.php?p=transaksi');
        }
    } else {
        $errorMessage = "Gagal tambah transaksi";
        header('location:../../index.php?p=transaksi');
    }   
}
?>