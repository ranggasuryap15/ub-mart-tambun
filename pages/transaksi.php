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
                        <label for="kodeBarangTransaksi" class="col-form-label fs-5">Kode Barang</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="kodeBarangTransaksi" name="kodeBarangTransaksi">
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="namaBarangTransaksi" class="col-form-label fs-5">Nama Barang</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="namaBarangTransaksi" name="namaBarangTransaksi" readonly>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="hargaTransaksi" class="col-form-label fs-5">Harga Barang</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="hargaTransaksi" name="hargaTransaksi" readonly>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="qtyTransaksi" class="col-form-label fs-5">Jumlah Barang</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="qtyTransaksi" name="qtyTransaksi" min=1dff>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="subTotalTransaksi" class="col-form-label fs-5">Sub-Total</label>
                        <div class="input-group">
                            <input type="text" readonly class="form-control" id="subTotalTransaksi" name="subTotalTransaksi">
                        </div>
                        <input class="btn btn-primary btn-lg rounded-pill my-4 btnTambah" type="button" value="Tambah" id="btnTambah">
                    </div>
                    <div class="mb-1 row">
                        <label for="transaksiBayar" class="col-form-label fs-5">Bayar</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="transaksiBayar" name="transaksiBayar">
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="transaksiKembalian" class="col-form-label fs-5">Kembalian</label>
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
                                <th class="align-items-center text-start" scope="col-6">NOTA: </th>
                                <th class="align-items-center text-end" scope="col-6">TGL: <?= date('d-m-Y') ?></th>
                            </tr>
                            <tr>
                                <th class="align-items-center text-start" scope="col-6">KASIR: ADMIN</th>
                                <th class="align-items-center text-end" scope="col-6"><span id="timestamp">JAM: <?php echo $timestamp = date('H:i:s')?></span></th>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-hover" id="tableStruk">
                        <thead>
                            <tr>
                                <th scope="col-4" class="text-and">Nama Barang</th>
                                <th scope="col-2" class="text-center">QTY</th>
                                <th scope="col-3" class="text-center">Harga</th>
                                <th scope="col-3" class="text-center">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr class="user-select-none">
                                <td scope="col-4" class="text-start">Detergen</td>
                                <td scope="col-2" class="text-center">5</td>
                                <td scope="col-3" class="text-center">Rp. 5.000</td>
                                <td scope="col-3" class="text-end">Rp. 25.000</td>
                            </tr>
                            <tr class="user-select-none">
                                <td scope="col-4" class="text-start">Detergen</td>
                                <td scope="col-2" class="text-center">5</td>
                                <td scope="col-3" class="text-center">Rp. 5.000</td>
                                <td scope="col-3" class="text-end">Rp. 25.000</td>
                            </tr>
                            <tr class="user-select-none">
                                <td scope="col-4" class="text-start">Cimory</td>
                                <td scope="col-2" class="text-center">5</td>
                                <td scope="col-3" class="text-center">Rp. 5.000</td>
                                <td scope="col-3" class="text-end">Rp. 25.000</td>
                            </tr>
                            <tr class="user-select-none">
                                <td scope="col-4" class="text-start">Detergen</td>
                                <td scope="col-2" class="text-center">5</td>
                                <td scope="col-3" class="text-center">Rp. 5.000</td>
                                <td scope="col-3" class="text-end">Rp. 25.000</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-group-divider">
                        <thead>
                            <tr>
                                <th class="align-items.center text-start" scope="col-6">Total</th>
                                <td class="align-items.center text-end" scope="col-6">Rp. 100.000</td>
                            </tr>
                            <tr>
                                <th class="align-items.center text-start" scope="col-6">Bayar</th>
                                <td class="align-items.center text-end" scope="col-6">Rp. 102.000</td>
                            </tr>
                            <tr>
                                <th class="align-items.center text-start" scope="col-6">Kembalian</td>
                                <td class="align-items.center text-end" scope="col-6">Rp. 2.000</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <script>

        var table = document.getElementById('tableStruk'), rIndex;

        for (var i = 0; i < table.rows.length; i++) {
            table.rows[i].onclick = function() {
                rIndex = this.rowIndex;
                document.getElementById("namaBarangTransaksi").value = this.cells[0].innerHTML;
                document.getElementById("qtyTransaksi").value = this.cells[1].innerHTML;
                document.getElementById("hargaTransaksi").value = this.cells[2].innerHTML;
                document.getElementById("stokBarang").value = parseInt(this.cells[3].innerHTML);
            };
        }
        // klik aktif table - start
        var activeTable = document.querySelectorAll('tbody tr');
        activeTable.forEach(td => {
            td.addEventListener("click", ()=> {
                resetActive();
                td.classList.add("table-active");
            });
        });

        function resetActive() {
            activeTable.forEach(td => {
                td.classList.remove("table-active");
            });
        }
        // klik aktif table - end

        // add row table javascript
        var btnAdd = document.getElementById("btnTambah");
        var table = document.getElementById("tableStruk");

        var namaBarangInput = document.getElementById("namaBarangTransaksi");
        var hargaBarangInput = document.getElementById("hargaTransaksi");
        var qtyTransaksiInput = document.getElementById("qtyTransaksi");
        var subTotalInput = document.getElementById("subTotalTransaksi");

        btnAdd.addEventListener('click', function() {
            var namaBarang = namaBarangInput.value;
            var hargaBarang = hargaBarangInput.value;
            var qtyTransaksi = qtyTransaksiInput.value;
            var subTotal = subTotalInput.value;

            var template = `
                        <tr>
                            <td scope="col-4" class="text-start">${namaBarang}</td>
                            <td scope="col-2" class="text-center">${qtyTransaksi}</td>
                            <td scope="col-3" class="text-center">${hargaBarang}</td>
                            <td scope="col-3" class="text-end">${subTotal}</td>
                        </tr>`;
            table.innerHTML += template;
        });
    </script>
</body>

</html>