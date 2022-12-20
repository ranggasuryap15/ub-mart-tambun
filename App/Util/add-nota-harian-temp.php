<?php

require_once (__DIR__ . "/../Class/Transaksi.php");
$notaHarian = new Transaksi;

// insert data
if (isset($_POST['btnBayar'])) {
    $nota = "UB12345";
    $tanggal = "2022-11-06";
    $transaksiBayar = $_POST['transaksiBayar'];
    $transaksiKembalian = $_POST['transaksiKembalian'];
    $kasir = "shafara354";

    if ($transaksiBayar >= $transaksiKembalian && !empty($transaksiBayar) && !empty($transaksiKembalian)) {
        $result = $notaHarian->insertNotaHarianTemp($nota, $tanggal, $transaksiBayar, $transaksiKembalian, $kasir);
        $errorStatus = "success";
        $errorMessage = "Berhasil menambahkan nota harian";

        if (!isset($result)) {
            header('location:../../index.php?p=transaksi');
        }
    }
}
?>