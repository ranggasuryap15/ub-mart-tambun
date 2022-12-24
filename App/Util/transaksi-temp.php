<?php
session_start();

require_once (__DIR__ . "/../Class/Transaksi.php");
require_once (__DIR__ . "/../Util.php");
$laporanPenjualan = new Transaksi;
$util = new Util;

$kodeBarang = $_POST['kodeBarangTransaksi'];
$namaBarang = $_POST['namaBarangTransaksi'];
$hargaBarang = $_POST['hargaTransaksi'];
$kuantitas = $_POST['qtyTransaksi'];
$subTotal = $_POST['subTotalTransaksi'];
$kasir = $_SESSION['username'];

// set to number
$hargaBarangNum = preg_replace('/[^0-9]/', '', $hargaBarang);
$subTotalNum = preg_replace('/[^0-9]/', '', $subTotal);

// update stok
if (isset($_POST['btnTambah'])) {
    if (!empty($kodeBarang) && $kuantitas != 0) {
        $result = $laporanPenjualan->insertTransaksiTemp($kodeBarang, $namaBarang, $hargaBarangNum, $kuantitas, $subTotalNum, $kasir);
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
        $result = $laporanPenjualan->updateTransaksiTemp($kodeBarang, $kuantitas);
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