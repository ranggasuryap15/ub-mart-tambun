<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:pages/login.php");
}

require_once (__DIR__ . "/../App/Class/Transaksi.php");
require_once (__DIR__ . "/../App/Util.php");
$transaksi = new Transaksi;
$util = new Util;
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Kasir | Laporan Penjualan</title>
    </head>

    <body class="text-bg-secondary">
        <div class="d-flex justify-content-center">
            <section class="col-10 mt-5">
                <div class="container text-bg-light rounded-5 p-3">
                    <h3 class="text-center border-bottom mb-5">Data Laporan Penjualan</h3>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col-1" class="text-center">Nota</th>
                                    <th scope="col-2" class="text-center">Kode Barang</th>
                                    <th scope="col-3" class="text-center">Nama Barang</th>
                                    <th scope="col-2" class="text-center">Harga Barang</th>
                                    <th scope="col-2" class="text-center">QTY</th>
                                    <th scope="col-2" class="text-center">Sub Total</th>
                                    <th scope="col-2" class="text-center">Kasir</th>
                                </tr>
                            </thead>
                            <tbody id="table">
                                <?php $laporanPenjualan = $transaksi->readLaporanPenjualan($_SESSION['username']); ?>
                                <?php foreach($laporanPenjualan as $row) : ?>
                                    <tr>
                                        <td scope='col' class='col-2 text-center'><?php echo $row['nota']; ?></td>
                                        <td scope='col' class='col-2 text-center'><?php echo $row['kode_barang']; ?></td>
                                        <td scope='col' class='col-2 text-center'><?php echo $row['nama_barang']; ?></td>
                                        <td scope='col-2' class='col-2 text-center'><?php echo $util->rupiah($row['harga_jual']); ?></td>
                                        <td scope='col-2' class='col-1 text-center'><?php echo $row['kuantitas']; ?></td>
                                        <td scope='col-2' class='col-1 text-center'><?php echo $util->rupiah($row['sub_total']); ?></td>
                                        <td scope='col-2' class='col-2 text-center'><?php echo $row['kasir']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>