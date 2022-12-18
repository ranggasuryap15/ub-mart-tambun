<?php
date_default_timezone_set('Asia/Jakarta');
require_once (__DIR__ . "/../App/Class/LaporanPenjualan.php");
$laporanPenjualan = new LaporanPenjualan;
$laporanPenjualan->readTransaksiTemp();
?>

<head>
    <title>Transaksi</title>
</head>

<body class="text-bg-secondary">
    <div class="row container-fluid mt-5">
        <section class="col-5">
            <div class="container text-bg-light rounded-5 p-4">
                <h3 class="align-items-center text-center border-bottom mb-3">Input Transaksi</h3>
                <form method="post" id="formTransaksi" onkeypress="return event.keyCode != 13" action="/ub-mart-tambun/App/Util/add-transaksi-temp.php">
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
                        <input class="btn btn-primary btn-lg rounded-pill my-4 btnTambah" type="submit" value="Tambah" id="btnTambah" name="btnTambah">
                        <input class="btn btn-primary btn-lg rounded-pill my-4 btnTambah" type="submit" value="Update" id="btnUpdate" name="btnUpdate" style="display: none;">
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
                    <!-- dinamis table -->
                    <table class="table table-hover" id="tableStruk">
                        <thead>
                            <tr>
                                <th scope="col-4" class="text-start">Kode Barang</th>
                                <th scope="col-4" class="text-center">Nama Barang</th>
                                <th scope="col-2" class="text-center">QTY</th>
                                <th scope="col-3" class="text-center">Harga</th>
                                <th scope="col-3" class="text-end">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider" id="tBodyStruk">
                            <?php $laporanPenjualan = $laporanPenjualan->readTransaksiTemp(); ?>
                            <?php foreach($laporanPenjualan as $row) : ?>
                                <tr>

                                    <td scope="col-4" class="text-start"><?php echo $row['kode_barang']; ?></td>
                                    <td scope="col-4" class="text-center"><?php echo $row['nama_barang']; ?></td>
                                    <td scope="col-2" class="text-center"><?php echo $row['kuantitas']; ?></td>
                                    <td scope="col-3" class="text-center"><?php echo $row['harga_jual']; ?></td>
                                    <td scope="col-3" class="text-end"><?php echo $row['sub_total']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    
                    <table class="table table-group-divider">
                        <thead>
                            <tr>
                                <th class="align-items.center text-start" scope="col-6">Total</th>
                                <td class="align-items.center text-end" scope="col-6" id="test">Rp. 100.000</td>
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
        $(document).ready(function() {

            // input search kode_barang
            var url = "/ub-mart-tambun/App/Util/load-barang-barcode.php"; // url json from mysql

            $.getJSON(url, function(data) {
                $.each(data, function(key, value) {
                    setInterval(function() {
                        $("#kodeBarangTransaksi").on('input',function(event) {
                            var kodeBarang = this.value;
                            
                            // jika field kodeBarangTransaksi ditekan enter maka akan muncul
                            if(event.target.value != "" && kodeBarang == value.kode_barang ) {
                                // output
                                $("#namaBarangTransaksi").val(value.nama_barang);
                                $("#hargaTransaksi").val(value.harga_jual);
                                
                                // set min max stok
                                if (value.stok <= 0) {
                                    $("#qtyTransaksi").prop('min', 0);
                                    $("#qtyTransaksi").val("0");
                                    $("#subTotalTransaksi").val("0");
                                } else {
                                    $("#qtyTransaksi").prop('min', 1);
                                    $("#qtyTransaksi").val("1");
                                    $("#subTotalTransaksi").val(value.harga_jual);
                                }

                                $("#qtyTransaksi").prop('max', value.stok);

                                // merubah harga sesuai dengan jumlah barang
                                $("#qtyTransaksi").on('input', function() {
                                    var hargaTransaksi = $("#hargaTransaksi").val();
                                    var qtyTransaksi = $("#qtyTransaksi").val();
                                    var subTotal = hargaTransaksi * qtyTransaksi;
                                    $("#subTotalTransaksi").val(subTotal);

                                    // max length
                                    if (this.value.length > 4) {
                                        this.value = this.value.slice(0,4);
                                    }
                                });
                            }
                            
                             // jika kode_barang tidak sesuai, maka langsung reset form
                            $("#kodeBarangTransaksi").on('input', function() {
                                if (this.value != value.kode_barang) {
                                    $("#namaBarangTransaksi").val("");
                                    $("#hargaTransaksi").val("");
                                    $("#qtyTransaksi").val("");
                                    $("#subTotalTransaksi").val("");
                                }
                            });
                        });
                    }, 1000);
                    
                });
            });
            
            $('#qtyTransaksi').on('keypress', function() {
                limitText(this, 10)
            });

            // table data kirim ke form
            var table = document.getElementById('tBodyStruk'), rIndex;

            for (var i = 0; i < table.rows.length; i++) {
                table.rows[i].onclick = function() {
                    rIndex = this.rowIndex;
                    document.getElementById("kodeBarangTransaksi").value = this.cells[0].innerHTML;
                    document.getElementById("namaBarangTransaksi").value = this.cells[1].innerHTML;
                    document.getElementById("qtyTransaksi").value = this.cells[2].innerHTML;
                    document.getElementById("hargaTransaksi").value = this.cells[3].innerHTML;
                    document.getElementById("subTotalTransaksi").value = parseInt(this.cells[4].innerHTML);
                };
            }

            // klik aktif table - start
            $("#tableStruk tbody tr").on("click", function(){
                
                // remove table-active in this row
                if ($(this).hasClass('table-active') == true) {
                    $(this).removeClass('table-active');
                    $("#kodeBarangTransaksi").val("");
                    $("#namaBarangTransaksi").val("");
                    $("#hargaTransaksi").val("");
                    $("#qtyTransaksi").val("");
                    $("#subTotalTransaksi").val("");
                } else {
                    $(this).addClass("table-active").siblings().removeClass("table-active");
                }
            })
            // klik aktif table - end 

            // cursor tr pointer
            $("#tableStruk tbody tr").css('cursor', 'pointer');

            // format rupiah
            function formatRupiah(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }
        });
    </script>
</body>