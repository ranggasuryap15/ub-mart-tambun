<?php

require_once(__DIR__ . "/../Config/Config.php");
require_once(__DIR__ . "/../Class/LaporanPenjualan.php");

$menu = $_GET['strukTransaksi'];
$act = $_GET['tambahBarangTransaksi'];

$laporanPenjualan = new LaporanPenjualan;

if ($menu == "strukTransaksi" && $act == "tambahBarangTransaksi") {
    $kodeBarang = $_POST['kodeBarangTransaksi'];
    $namaBarang = $_POST['namaBarangTransaksi'];
    $hargaBarang = $_POST['hargaBarangTransaksi'];
    $kuantitas = $_POST['qtyTransaksi'];
    $subTotal = $_POST['subTotalTransaksi'];

    $laporanPenjualan->insertTransaksiTemp($kodeBarang, $namaBarang, $hargaBarang, $kuantitas, $subTotal);
    header("location:index.php?p=transaksi.php");
}