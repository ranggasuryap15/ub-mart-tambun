<?php

include (__DIR__ . "/../Config/Config.php");

class Transaksi extends Config {
    // atribut
    private string $kode_barang = "";
    private int $kuantitas = 0;
    private int $sub_total = 0;
    private string $kasir = "";
    private string $nota = "";

    // insert transaksi temporary
    public function insertTransaksiTemp($kode_barang, $nama_barang, $harga_jual, $kuantitas, $sub_total) {
        try {
            $cekKodeBarang = "SELECT * FROM kasir_ub_mart.transaksi_struk_temp WHERE kode_barang=$kode_barang";
            $cek = $this->pdo->query($cekKodeBarang);
            $rowCount = $cek->rowCount();

            if ($rowCount > 0) {
                // update data jika kode barang ada yang sama
                $sql = "UPDATE kasir_ub_mart.transaksi_struk_temp SET kuantitas=kuantitas + :kuantitas, sub_total=harga_jual * kuantitas WHERE kode_barang=:kode_barang";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam('kuantitas', $kuantitas);
                $stmt->bindParam('kode_barang', $kode_barang);
                $stmt->execute();
            } else {
                $sql = "INSERT INTO kasir_ub_mart.transaksi_struk_temp (kode_barang, nama_barang, harga_jual, kuantitas, sub_total) VALUES (:kode_barang, :nama_barang, :harga_jual, :kuantitas, :sub_total)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam('kode_barang', $kode_barang);
                $stmt->bindParam('nama_barang', $nama_barang);
                $stmt->bindParam('harga_jual', $harga_jual);
                $stmt->bindParam('kuantitas', $kuantitas);
                $stmt->bindParam('sub_total', $sub_total);
                $stmt->execute();
            }


            
        } catch (PDOException $e) {
            // $sql = "UPDATE STOK ";
            echo "Tambah transaksi gagal. <br>" . $e->getMessage();
        }
    }

    public function insertNotaHarianTemp($nota, $tanggal, $bayar, $kembalian, $kasir) {
        try {
            $sql = "INSERT INTO kasir_ub_mart.nota_harian_temp (nota, tanggal, bayar, kembalian, kasir) VALUES (:nota, :tanggal, :bayar, :kembalian, :kasir)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam('nota', $nota);
            $stmt->bindParam('tanggal', $tanggal);
            $stmt->bindParam('bayar', $bayar);
            $stmt->bindParam('kembalian', $kembalian);
            $stmt->bindParam('kasir', $kasir);

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Tambah Nota Harian gagal. <br>" . $e->getMessage();
        }
    }

    // read transaksi temporary
    public function readTransaksiTemp() {
        $sql = "SELECT * FROM kasir_ub_mart.transaksi_struk_temp ORDER BY id ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    // UPDATE TRANSAKSI
    public function updateTransaksiTemp($kode_barang, $harga_jual, $kuantitas) {
        $sql = "UPDATE kasir_ub_mart.transaksi_struk_temp SET kuantitas=:kuantitas, harga_jual=:harga_jual, sub_total=kuantitas * harga_jual WHERE kode_barang=:kode_barang";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('kuantitas', $kuantitas);
        $stmt->bindParam('harga_jual', $harga_jual);
        $stmt->bindParam('kode_barang', $kode_barang);
        $stmt->execute();
    }

    // DELETE TRANSAKSI BY KODE_BARANG
    public function deleteTransaksiTemp($kode_barang) {
        $sql = "DELETE FROM kasir_ub_mart.transaksi_struk_temp WHERE kode_barang=:kode_barang";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('kode_barang', $kode_barang);
        $stmt->execute();
    }

    // nota harian temp
    public function readNotaHarianTemp() {
        $sql = "SELECT * FROM kasir_ub_mart.nota_harian_temp";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
}