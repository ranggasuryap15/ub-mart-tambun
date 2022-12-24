<?php 
session_start();

require_once (__DIR__ . "/../Class/Transaksi.php");
$transaksi = new Transaksi;

// for nota harian
$nota = $_POST['notaTransaksi'];
$tanggal = $_POST['tanggalInput'];
$bayar = $_POST['transaksiBayar'];
$kembalian = $_POST['transaksiKembalian'];
$kasir = $_SESSION['username'];

// set to number
$bayar = preg_replace('/[^0-9]/', '', $bayar);
$kembalian = preg_replace('/[^0-9]/', '', $kembalian);

// for laporan penjualan
$kodeBarang = "";
$kuantitas = 0;
$subTotal = 0;

if (isset($_POST['btnSimpanTransaksi'])) {
    $transaksi->insertNotaHarian($nota, $tanggal, $bayar, $kembalian, $kasir);
    $transaksiTemp = $transaksi->readTransaksiTemp($kasir);
    foreach ($transaksiTemp as $row) :
        $kodeBarang = $row['kode_barang'];
        $kuantitas = $row['kuantitas'];
        $subTotal = $row['sub_total'];
        $transaksi->insertLaporanPenjualan($kodeBarang, $kuantitas, $subTotal, $kasir, $nota);
    endforeach;
    header("location:../../index.php?p=transaksi");   
}

?>