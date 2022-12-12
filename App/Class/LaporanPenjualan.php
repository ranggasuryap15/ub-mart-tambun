<?php

include (__DIR__ . "/../Config/Config.php");

class LaporanPenjualan extends Config {
    // atribut
    private string $kode_barang = "";
    private int $kuantitas = 0;
    private int $sub_total = 0;
    private string $kasir = "";
    private string $nota = "";

    // insert transaksi temporary
    public function insertTransaksiTemp($kode_barang, $nama_barang, $harga_jual, $kuantitas, $sub_total) {
        $sql = "INSERT INTO transaksi_struk_temp ('kode_barang', 'nama_barang', 'harga_jual', 'kuantitas', 'sub_total') VALUES (:kode_barang, :nama_barang, :harga_jual, :kuantitas, :sub_total)";
        $data = $this->config->prepare($sql);
        $data->bindParam('kode_barang', $kode_barang);
        $data->bindParam('nama_barang', $nama_barang);
        $data->bindParam('harga_jual', $harga_jual);
        $data->bindParam('kuantitas', $kuantitas);
        $data->bindParam('sub_total', $sub_total);

        $data->execute($data);
        return $data->rowCount();
    }

    // read transaksi temporary
    public function readTransaksiTemp() {
        $sql = "SELECT * FROM kasir_ub_mart.transaksi_struk_temp ORDER BY id ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    
}