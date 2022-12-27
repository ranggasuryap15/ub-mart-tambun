<?php

include (__DIR__ . "/../Config/Config.php");

class Transaksi extends Config {
    // atribut
    private string $kode_barang = "";
    private int $kuantitas = 0;
    private int $sub_total = 0;
    private string $kasir = "";
    private string $nota = "";

    // insert transaksi to laporan penjualan
    public function insertLaporanPenjualan($kodeBarang, $kuantitas, $sub_total, $kasir, $nota) {
        $sql = "INSERT INTO kasir_ub_mart.laporan_penjualan (kode_barang, kuantitas, sub_total, kasir, nota) VALUES (:kode_barang, :kuantitas, :sub_total, :kasir, :nota)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('kode_barang', $kodeBarang);
        $stmt->bindParam('kuantitas', $kuantitas);
        $stmt->bindParam('sub_total', $sub_total);
        $stmt->bindParam('kasir', $kasir);
        $stmt->bindParam('nota', $nota);
        $stmt->execute();
    }

    // insert nota
    public function insertNotaHarian($nota, $tanggal, $jam, $total, $bayar, $kembalian, $kasir) {
        $sql = "INSERT INTO kasir_ub_mart.nota_harian (nota, tanggal, jam, total, bayar, kembalian, kasir) VALUES (:nota, :tanggal, :jam, :total, :bayar, :kembalian, :kasir)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('nota', $nota);
        $stmt->bindParam('tanggal', $tanggal);
        $stmt->bindParam('jam', $jam);
        $stmt->bindParam('total', $total);
        $stmt->bindParam('bayar', $bayar);
        $stmt->bindParam('kembalian', $kembalian);
        $stmt->bindParam('kasir', $kasir);
        $stmt->execute();
    }


    // insert transaksi temporary
    public function insertTransaksiTemp($kode_barang, $nama_barang, $harga_jual, $kuantitas, $sub_total, $kasir) {
        try {
            $cekKodeBarang = "SELECT * FROM kasir_ub_mart.transaksi_struk_temp WHERE kode_barang=$kode_barang";
            $cek = $this->pdo->query($cekKodeBarang);
            $rowCount = $cek->rowCount();

            if ($rowCount > 0) {
                // update data jika kode barang ada yang sama
                $sql = "UPDATE kasir_ub_mart.transaksi_struk_temp SET kuantitas=:kuantitas, sub_total=harga_jual * kuantitas WHERE kode_barang=:kode_barang";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam('kuantitas', $kuantitas);
                $stmt->bindParam('kode_barang', $kode_barang);
                $stmt->execute();
            } else {
                $sql = "INSERT INTO kasir_ub_mart.transaksi_struk_temp (kode_barang, nama_barang, harga_jual, kuantitas, sub_total, kasir) VALUES (:kode_barang, :nama_barang, :harga_jual, :kuantitas, :sub_total, :kasir)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam('kode_barang', $kode_barang);
                $stmt->bindParam('nama_barang', $nama_barang);
                $stmt->bindParam('harga_jual', $harga_jual);
                $stmt->bindParam('kuantitas', $kuantitas);
                $stmt->bindParam('sub_total', $sub_total);
                $stmt->bindParam('kasir', $kasir);
                $stmt->execute();
            }
        } catch (PDOException $e) {
            // $sql = "UPDATE STOK ";
            echo "Tambah transaksi gagal. <br>" . $e->getMessage();
        }
    }

    // read transaksi temporary
    public function readTransaksiTemp($kasir) {
        $sql = "SELECT * FROM kasir_ub_mart.transaksi_struk_temp WHERE kasir=:kasir ORDER BY id ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('kasir', $kasir);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    // read laporan penjualan
    public function readLaporanPenjualan($kasir) {
        $sql = "SELECT nota.nota, lp.kode_barang, db.nama_barang, db.harga_jual, lp.kuantitas, lp.sub_total, db.profit, nota.kasir FROM kasir_ub_mart.nota_harian nota INNER JOIN kasir_ub_mart.laporan_penjualan lp ON nota.nota = lp.nota INNER JOIN kasir_ub_mart.data_barang db ON lp.kode_barang = db.kode_barang WHERE nota.kasir=:kasir";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('kasir', $kasir);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    // UPDATE TRANSAKSI
    public function updateTransaksiTemp($kode_barang, $kuantitas) {
        $sql = "UPDATE kasir_ub_mart.transaksi_struk_temp SET kuantitas=:kuantitas, sub_total=kuantitas * harga_jual WHERE kode_barang=:kode_barang";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('kuantitas', $kuantitas);
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

    public function notaCustom($tanggal) {
        $sql = "SELECT nota, tanggal FROM kasir_ub_mart.nota_harian WHERE tanggal = :tanggal ORDER BY nota DESC LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('tanggal', $tanggal);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}