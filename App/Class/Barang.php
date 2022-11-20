<?php

include (__DIR__ . "/../Config/Config.php");

class Barang extends Config {
    // properties
    private string $kode_barang = "";
    private string $nama_barang = "";
    private int $harga_pokok = 0;
    private int $harga_jual = 0;
    private int $profit = 0;
    private int $stok = 0;
    private string $satuan = "";
    private $tanggal;

    // Setter Getter - Mulai
    public function setKodeBarang($kode_barang) {
        $this->kode_barang = $kode_barang;
    }

    public function getKodeBarang() {
        return $this->kode_barang;
    }

    public function setNamaBarang($nama_barang) {
        $this->nama_barang = $nama_barang;
    }

    public function getNamaBarang() {
        return $this->nama_barang;
    }

    public function setHargaPokok($harga_pokok) {
        $this->harga_pokok = $harga_pokok;
    }

    public function getHargaPokok() {
        return $this->harga_pokok;
    }

    public function setHargaJual($harga_jual) {
        $this->harga_jual = $harga_jual;
    }

    public function getHargaJual() {
        return $this->harga_jual;
    }

    public function setProfit($profit) {
        $this->profit = $profit;
    }

    public function getProfit() {
        return $this->profit;
    }

    public function setStok($stok) {
        $this->stok = $stok;
    }

    public function getStok() {
        return $this->stok;
    }
    
    public function setSatuan($satuan) {
        $this->satuan = $satuan;
    }

    public function getSatuan() {
        return $this->satuan;
    }

    public function setTanggal($tanggal) {
        $this->tanggal = $tanggal;
    }
    
    public function getTanggal() {
        return $this->tanggal;
    }
    // Setter Getter AKhir

    // Function for table data_barang
    public function tambahBarang($kode_barang, $nama_barang, $harga_pokok, $harga_jual, $profit, $stok, $satuan, $tanggal) {
        $sql = "INSERT INTO data_barang ('kode_barang, 'nama_barang', 'harga_pokok', 'harga_jual', 'profit', 'stok', 'satuan', 'tanggal') VALUES (:kode_barang, :nama_barang, :harga_pokok, :harga_jual, :profit, :stok, :satuan, :tanggal)";
        $data = $this->config->prepare($sql);
        $data->bindParam('kode_barang', $kode_barang);
        $data->bindParam('nama_barang', $nama_barang);
        $data->bindParam('harga_pokok', $harga_pokok);
        $data->bindParam('harga_jual', $harga_jual);
        $data->bindParam('profit', $profit);
        $data->bindParam('stok', $stok);
        $data->bindParam('satuan', $satuan);
        $data->bindParam('tanggal', $tanggal);

        $data->execute($data);
        return $data->rowCount();
    }

    public function readBarang() 
    {
        $sql = "SELECT * FROM kasir_ub_mart.data_barang ORDER BY nama_barang ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}