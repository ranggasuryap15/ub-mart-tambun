<?php
date_default_timezone_set('Asia/Jakarta');
require_once (__DIR__ . "/../App/Class/Transaksi.php");
require_once (__DIR__ . "/../App/Util.php");
$laporanPenjualan = new Transaksi;
$util = new Util;
?>
<head>
    <title>Kasir | Transaksi</title>
</head>

<body class="text-bg-secondary">
    <div class="row container-fluid mt-5">
        <section class="col-5">
            <div class="container text-bg-light rounded-5 p-4">
                <h3 class="align-items-center text-center border-bottom mb-3">Input Transaksi</h3>
                <form method="post" id="formTransaksi" onkeypress="return event.keyCode != 13" action="/ub-mart-tambun/App/Util/transaksi-temp.php">
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
                        <div class="input-group" id="divUpdateDelete">
                            <input class="btn btn-warning btn-lg rounded-pill my-4 mx-3" type="submit" value="Update" id="btnUpdate" name="btnUpdate" style="display: none;"> 
                            <input class="btn btn-danger btn-lg rounded-pill my-4" type="submit" value="Delete" id="btnDelete" name="btnDelete" style="display: none;">
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <section class="col-1">
            <!-- SPACING -->
        </section>

        <section class="col-6">
            <form action="" >
                <div class="container text-bg-light rounded-5 p-3">
                    <h3 class="text-center border-bottom">UB Mart</h3>
                    <p class="text-center lh-1">Kampung Kobak, RW 2, Desa Mekarsari</p>
                    <p class="text-center lh-1 border-bottom mb-3">Telp. 0891234714871</p>
                    <div class="container table-responsive p-3">
                        <table class="table container border-bottom">
                            <tbody>
                                <tr>
                                    <input type="text" name="notaTransaksi" value="<?= "UB2022"; ?>" hidden> 
                                    <th class="align-items-center text-start" scope="col-6">NOTA: <?= "UB2022"; ?></th>
                                    <input type="text" name="tanggalInput" value="<?= date('d-m-Y') ?>" hidden> 
                                    <th class="align-items-center text-end" scope="col-6">TGL: <?= date('d-m-Y') ?></th>
                                </tr>
                                <tr>
                                    <input type="text" name="usernameKasir" value="<?= "shafara354" ?>" hidden> <!-- to get kasir username -->
                                    <th class="align-items-center text-start" scope="col-6">KASIR: ADMIN</th>
                                    <input type="text" name="jamInput" value="<?php echo $timestamp = date('H:i')?>" hidden> <!-- to get value jam -->
                                    <th class="align-items-center text-end" scope="col-6"><span id="timestamp">JAM: <?php echo $timestamp = date('H:i')?></span></th>
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
                                        <td scope="col-3" class="text-center rupiah"><?php echo $util->rupiah($row['harga_jual']); ?></td>
                                        <td scope="col-3" class="text-end rupiah"><?php echo $util->rupiah($row['sub_total']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        
                        <table class="table table-group-divider">
                            <thead>
                                <tr>
                                    <th class="align-items.center text-start" scope="col-6">Total</th>
                                    <td class="align-items.center text-end" scope="col-6" id="totalFromSubTotalRow"></td>
                                </tr>
                                <tr>
                                    <th class="align-items.center text-start" scope="col-6">Bayar</th>
                                    <td class="align-items.center text-end" scope="col-6"><input type="tel" id="transaksiBayar" name="transaksiBayar" required/></td>
                                </tr>
                                <tr>
                                    <th class="align-items.center text-start" scope="col-6">Kembalian</td>
                                    <td class="align-items.center text-end" scope="col-6"><input type="tel"  id="transaksiKembalian" name="transaksiKembalian" readonly required></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td class="align-items.center text-end"><input class="btn btn-primary btn-lg rounded-pill my-4" id="btnSimpanTransaksi" name="btnSimpanTransaksi" type="submit" value="Simpan"></td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </form>
        </section>
    </div>
    <script>
        $(document).ready(function() {

            // input search kode_barang
            var url = "/ub-mart-tambun/App/Util/load-barang-barcode.php"; // url json from mysql
            
            $.getJSON(url, function(data) {
                $.each(data, function(key, value) {
                    $("#kodeBarangTransaksi").on('input keypress',function(event) {
                        var kodeBarang = this.value;
                        
                        // jika field kodeBarangTransaksi ditekan enter maka akan muncul
                        if(event.target.value != "" && $.trim(kodeBarang) == value.kode_barang ) {
                            // output
                            $("#namaBarangTransaksi").val(value.nama_barang);
                            $("#hargaTransaksi").val(formatRupiah(value.harga_jual));
                            
                            // set max match to value stok
                            $("#qtyTransaksi").prop('max', value.stok);

                            // set min max stok
                            if (value.stok <= 0) {
                                $("#qtyTransaksi").prop('min', 0);
                                $("#qtyTransaksi").val("0");
                                $("#subTotalTransaksi").val("Rp 0");
                            } else {
                                $("#qtyTransaksi").prop('min', 1);
                                $("#qtyTransaksi").val("1");
                                $("#subTotalTransaksi").val(formatRupiah(value.harga_jual));
                            }

                            // merubah harga sesuai dengan jumlah barang
                            $("#qtyTransaksi").on('input', function() {
                                // hitung harga * qty
                                var qtyTransaksi = $(this).val();
                                var subTotal = value.harga_jual * qtyTransaksi;
                                $("#subTotalTransaksi").val(formatRupiah(subTotal));

                                // max length
                                if (this.value.length > 4) {
                                    this.value = this.value.slice(0,4);
                                }
                            });
                        }
                    });
                    
                    // jika kode_barang tidak sesuai, maka langsung reset form
                    $("#kodeBarangTransaksi").on('input', function() {
                        if (this.value != value.kode_barang) {
                            // reset form
                            $("#namaBarangTransaksi").val("");
                            $("#hargaTransaksi").val("");
                            $("#qtyTransaksi").val("");
                            $("#subTotalTransaksi").val("");

                            // show hide button
                            $("#btnTambah").show();
                            $("#btnUpdate").hide();
                            $("#btnDelete").hide();

                            // remove active row 
                            $("#tableStruk tbody tr").removeClass("table-active");
                        }
                    });
                });
            });
            
            // klik aktif table - start
            $("#tableStruk tbody tr").on("click", function() {
                // remove table-active in this row
                if ($(this).hasClass('table-active') == true) {
                    $(this).removeClass('table-active');
                    // reset form
                    $("#kodeBarangTransaksi").val("");
                    $("#namaBarangTransaksi").val("");
                    $("#hargaTransaksi").val("");
                    $("#qtyTransaksi").val("");
                    $("#subTotalTransaksi").val("");

                    // show hide button
                    $("#btnTambah").show();
                    $("#btnUpdate").hide();
                    $("#btnDelete").hide();
                } else {
                    // add table active
                    $(this).addClass("table-active").siblings().removeClass("table-active");

                    // get current row
                    var currentRow = $(this).closest('tr');

                    // get data from table row 
                    var kodeBarang = currentRow.find('td:eq(0)').text(); 
                    var namaBarang = currentRow.find('td:eq(1)').text();
                    var qtyTransaksi = currentRow.find('td:eq(2)').text();
                    var hargaJual = parseInt(currentRow.find('td:eq(3)').text().replace(/[^0-9]/g,''));
                    var subTotal = parseInt(currentRow.find('td:eq(4)').text().replace(/[^0-9]/g,''));
                    
                    // set form
                    $("#kodeBarangTransaksi").val(kodeBarang);
                    $("#namaBarangTransaksi").val(namaBarang);
                    $("#hargaTransaksi").val(formatRupiah(hargaJual));
                    $("#qtyTransaksi").val(qtyTransaksi);
                    $("#subTotalTransaksi").val(formatRupiah(subTotal));

                    // show hide button
                    $("#btnTambah").hide();
                    $("#btnUpdate").show();
                    $("#btnDelete").show();

                    // set min to 1
                    $("#qtyTransaksi").prop('min', 1);
                    // $("#qtyTransaksi").prop('max', value.stok);

                    $("#qtyTransaksi").on('input', function() {
                        // set harga transaksi to number
                        var hargaTransaksi = $("#hargaTransaksi").val().replace(/[^0-9]/g,'');

                        // hitung subtotal berdasarkan qtyTransaksi
                        var qtyTransaksi = $(this).val();
                        var subTotal = hargaTransaksi * qtyTransaksi;
                        $("#subTotalTransaksi").val(formatRupiah(subTotal));
                    });
                }
            })
            // klik aktif table - end 

            $('#qtyTransaksi').on('keypress', function() {
                limitText(this, 10)
            });

            // table data kirim ke form
            // var table = document.getElementById('tBodyStruk'), rIndex;

            // for (var i = 0; i < table.rows.length; i++) {
            //     table.rows[i].onclick = function() {
            //         rIndex = this.rowIndex;
            //         document.getElementById("kodeBarangTransaksi").value = this.cells[0].innerHTML;
            //         document.getElementById("namaBarangTransaksi").value = this.cells[1].innerHTML;
            //         document.getElementById("qtyTransaksi").value = this.cells[2].innerHTML;
            //         document.getElementById("hargaTransaksi").value = formatRupiah(this.cells[3].innerHTML.replace(/[^0-9]/g,''));
            //         document.getElementById("subTotalTransaksi").value = formatRupiah(this.cells[4].innerHTML.replace(/[^0-9]/g,''));
            //     };
            // }

            // cursor tr pointer
            $("#tableStruk tbody tr").css('cursor', 'pointer');

            // rupiah format setText
            function formatRupiah(angka) {
                return new Intl.NumberFormat('id-ID', {
                    style:'currency',
                    currency:'IDR',
                    minimumFractionDigits:0,
                    maximumFractionDigits: 2
                }).format(angka);
            }

            // function for find the total of subTotal
            var sumSubTotal = 0;
            var trCount = $("#tableStruk tbody tr").length;

            for (i = 0; i < trCount; i++) {

                var tdText = $("#tableStruk tbody tr:eq(" + i + ") td:eq(4)").text();
                // set text to number
                tdText = tdText.replace(/[^0-9]/g,'');
                sumSubTotal += Number(tdText);
            }

            // set number to rupiah format
            $("#totalFromSubTotalRow").text(formatRupiah(sumSubTotal));
            
            // function bayar kembalian dari total
            var totalHargaBayar = sumSubTotal;
            
            $("#transaksiBayar").on("input", function() {
                // format rupiah in transaksi bayar
                var bayarRupiah = $(this).val().replace(/[^0-9]/g,'');
                var transaksiBayarRupiah = formatRupiah(bayarRupiah);
                $(this).val(transaksiBayarRupiah);               
                
                // hitung kembalian
                var kembalian = bayarRupiah - totalHargaBayar;

                // minus on input
                if (kembalian < 0) {
                    $("#transaksiKembalian").val(formatRupiah(kembalian));
                } else {
                    // cetak transaksi kembalian
                    kembalian = formatRupiah(kembalian);
                    $("#transaksiKembalian").val(kembalian);
                }
            });
        });
    </script>
</body>