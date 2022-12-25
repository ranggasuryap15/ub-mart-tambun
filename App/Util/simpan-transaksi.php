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

// find minus
$cutKembalian = str_split($kembalian);

// set to number
$bayar = preg_replace('/[^0-9]/', '', $bayar);
$kembalian = preg_replace('/[^0-9]/', '', $kembalian);

if (isset($_POST['btnSimpanTransaksi'])) {
    if ($cutKembalian[0] != "-") {
        $transaksi->insertNotaHarian($nota, $tanggal, $bayar, $kembalian, $kasir);
        $transaksiTemp = $transaksi->readTransaksiTemp($kasir);
        foreach ($transaksiTemp as $row) :
            $kodeBarang = $row['kode_barang'];
            $kuantitas = $row['kuantitas'];
            $subTotal = $row['sub_total'];
            $transaksi->insertLaporanPenjualan($kodeBarang, $kuantitas, $subTotal, $kasir, $nota);
        endforeach;
        header("location:../../index.php?p=transaksi");
    } else {
        // gagal insert
        header("location:../../index.php?p=transaksi");
    }
}

?>