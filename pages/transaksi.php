<?php
date_default_timezone_set('Asia/Jakarta');
require_once(__DIR__ . "/../App/Class/Barang.php");
require_once(__DIR__ . "/../App/Config/Config.php");

$barang = new Barang;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Transaksi</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body class="text-bg-secondary">
    <div class="row container-fluid mt-5">
        <section class="col-5">
            <div class="container text-bg-light rounded-5 p-4">
                <h3 class="align-items-center text-center border-bottom mb-3">Input Transaksi</h3>
                <form method="post" id="formTransaksi" onkeypress="return event.keyCode != 13">
                    <div class="mb-1 row">
                        <label for="" class="col-form-label fs-5">Tgl. Transaksi</label>
                        <div class="input-group">
                            <input type="text" readonly class="form-control" id="tglTransaksi" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="" class="col-form-label fs-5">Kode Barang</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="kodeBarangTransaksi" name="kodeBarangTransaksi">
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="" class="col-form-label fs-5">Nama Barang</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="namaBarangTransaksi" name="namaBarangTransaksi" readonly>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="" class="col-form-label fs-5">Harga Barang</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="hargaTransaksi" name="hargaTransaksi" readonly>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="" class="col-form-label fs-5">Jumlah Barang</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="qtyTransaksi" name="qtyTransaksi" min=0>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="" class="col-form-label fs-5">Sub-Total</label>
                        <div class="input-group">
                            <input type="text" readonly class="form-control" id="subTotalTransaksi" name="subTotalTransaksi">
                        </div>
                        <input class="btn btn-primary btn-lg rounded-pill my-4" type="submit" value="Tambah">
                    </div>
                    <div class="mb-1 row">
                        <label for="" class="col-form-label fs-5">Bayar</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="transaksiBayar" name="transaksiBayar">
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="" class="col-form-label fs-5">Kembalian</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="transaksiKembalian" readonly>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <input class="btn btn-primary btn-lg rounded-pill my-4" type="button" value="Bayar">
                    </div>
                </form>
            </div>
        </section>

        <section class="col-1">
            <!-- SPACING -->
        </section>

        <section class="col-5">
            <div class="container text-bg-light rounded-5 p-3">
                <h3 class="text-center border-bottom">UB Mart</h3>
                <p class="text-center lh-1">Kampung Kobak, RW 2, Desa Mekarsari</p>
                <p class="text-center lh-1 border-bottom mb-3">Telp. 0891234714871</p>
                <div class="container table-responsive p-3">
                    <table class="table container border-bottom">
                        <tbody>
                            <tr>
                                <th class="align-items-center text-end" scope="col-6">NOTA: </th>
                                <th class="align-items-center text-start" scope="col-6">TGL: <?= date('d-m-Y') ?></th>
                            </tr>
                            <tr>
                                <th class="align-items-center text-end" scope="col-6">KASIR: ADMIN</th>
                                <th class="align-items-center text-start" scope="col-6"><span id="timestamp">JAM: <?php echo $timestamp = date('H:i:s')?></span></th>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col-4" class="text-and">Nama Barang</th>
                                <th scope="col-2" class="text-center">QTY</th>
                                <th scope="col-3" class="text-center">Harga</th>
                                <th scope="col-3" class="text-center">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr>
                                <td scope="col-4" class="text-end">Detergen</td>
                                <td scope="col-2" class="text-center">5</td>
                                <td scope="col-3" class="text-center">Rp. 5.000</td>
                                <td scope="col-3" class="text-start">Rp. 25.000</td>
                            </tr>
                            <tr>
                                <td scope="col-4" class="text-end">Detergen</td>
                                <td scope="col-2" class="text-center">5</td>
                                <td scope="col-3" class="text-center">Rp. 5.000</td>
                                <td scope="col-3" class="text-start">Rp. 25.000</td>
                            </tr>
                            <tr>
                                <td scope="col-4" class="text-end">Detergen</td>
                                <td scope="col-2" class="text-center">5</td>
                                <td scope="col-3" class="text-center">Rp. 5.000</td>
                                <td scope="col-3" class="text-start">Rp. 25.000</td>
                            </tr>
                            <tr>
                                <td scope="col-4" class="text-end">Detergen</td>
                                <td scope="col-2" class="text-center">5</td>
                                <td scope="col-3" class="text-center">Rp. 5.000</td>
                                <td scope="col-3" class="text-start">Rp. 25.000</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th class="align-items.center text-end" scope="col-6">Total</th>
                                <td class="align-items.center text-start" scope="col-6">Rp. 100.000</td>
                            </tr>
                            <tr>
                                <th class="align-items.center text-end" scope="col-6">Bayar</th>
                                <td class="align-items.center text-start" scope="col-6">Rp. 102.000</td>
                            </tr>
                            <tr>
                                <th class="align-items.center text-end" scope="col-6">Kembalian</td>
                                <td class="align-items.center text-start" scope="col-6">Rp. 2.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <script>

        
        $(document).ready(function() {


            $("#kodeBarangTransaksi").keypress(function(event) {
                // jika field kodeBarangTransaksi ditekan enter
                if (event.keyCode == 13 && event.target.value!="" ) {
                    var kodeBarang = this.value; // input dari form
                    var expression = new RegExp(kodeBarang, "i");
                    var url = "/ub-mart-tambun/App/Util/load-barang-barcode.php";
                    
                    $.getJSON(url, function(data) {
                        $.each(data, function(key, value) {
                            if (value.kode_barang.search(expression) != -1) {
                                $("#namaBarangTransaksi").val(value.nama_barang);
                                $("#hargaTransaksi").val(value.harga_jual);
                            }
                        });
                    });
                }
            });
            
        });
    </script>
</body>

</html>