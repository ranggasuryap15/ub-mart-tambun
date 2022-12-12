<?php 

require_once(__DIR__ . "/../Class/LaporanPenjualan.php");

$laporanPenjualan = new LaporanPenjualan;

$data = $laporanPenjualan->readTransaksiTemp();
?>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col-4" class="text-start">Nama Barang</th>
            <th scope="col-2" class="text-center">QTY</th>
            <th scope="col-3" class="text-center">Harga</th>
            <th scope="col-3" class="text-end">Sub Total</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php foreach($data as $row) : ?>
            <tr>
                <td scope="col-4" class="text-start"><?php echo $row['nama_barang']; ?></td>
                <td scope="col-2" class="text-center"><?php echo $row['kuantitas']; ?></td>
                <td scope="col-3" class="text-center"><?php echo $row['harga_jual']; ?></td>
                <td scope="col-3" class="text-end"><?php echo $row['sub_total']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
