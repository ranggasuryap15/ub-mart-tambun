<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:pages/login.php");
}

require_once (__DIR__ . "/../App/Class/Barang.php");
require_once (__DIR__ . "/../App/Util.php");
$util = new Util;
$barang = new Barang;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kasir | Barang</title>
</head>

<body class="text-bg-secondary">
    <div class="row container-fluid mt-5">
        <section class="col-5">
            <div class="container text-bg-light rounded-5 p-4 ">
                <h3 class="text-center border-bottom mb-5">Input Barang</h3>
                <form action="/ub-mart-tambun/App/Util/update-barang.php" method="post">
                    <div class="mb-1 row">
                        <label for="" class="col-form-label fs-5">Kode Barang</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="kodeBarang" name="kodeBarang" readonly>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="" class="col-form-label fs-5">Nama Barang</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="namaBarang" name="namaBarang" readonly>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="" class="col-form-label fs-5">Harga Barang</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="hargaBarang" name="hargaBarang" readonly>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="" class="col-form-label fs-5">Stok</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="stokBarang" name="stokBarang" min=0>
                        </div>
                    </div>
                    <input class="btn btn-primary btn-lg rounded-pill my-4" type="submit" name="updateButton" value="Perbarui Stok">
                </form>
            </div>
        </section>
        <section class="col-7">
            <div class="container text-bg-light rounded-5 p-3">
                <h3 class="text-center border-bottom mb-5">Data Barang</h3>
                <div class="table-responsive">
                    <table class="table table-hover" id="tableBarang">
                        <thead>
                            <tr>
                                <th scope="col-2" class="text-center">Kode Barang</th>
                                <th scope="col-3" class="text-center">Nama Barang</th>
                                <th scope="col-2" class="text-center">Harga Barang</th>
                                <th scope="col-1" class="text-center">Stok Barang</th>
                            </tr>
                        </thead>
                        <tbody id="tBodyBarang">
                            <?php 
                                $allBarang = $barang->readBarang();

                                foreach ($allBarang as $row) {
                                    echo "<tr class='user-select-none'>";
                                    echo    "<td scope='col-2' class='text-center'>". $row['kode_barang'] ."</td>";
                                    echo    "<td scope='col-3' class='text-center'>". $row['nama_barang'] ."</td>";
                                    echo    "<td scope='col-2' class='text-center'>". $util->rupiah($row['harga_jual']) . "</td>";
                                    echo    "<td scope='col-1' class='text-center'>". $row['stok'] . ' ' . $row['satuan'] . "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <script>
        $(document).ready(function() {
            // klik aktif table - start
            $("#tableBarang tbody tr").on("click", function() {
                // remove table-active in this row
                if ($(this).hasClass('table-active') == true) {
                    $(this).removeClass('table-active');

                    // reset form 
                    $("#kodeBarang").val("");
                    $("#namaBarang").val("");
                    $("#hargaBarang").val("");
                    $("#stokBarang").val("");
                } else {
                    // add table active
                    $(this).addClass("table-active").siblings().removeClass("table-active");

                    // kirim data dari tabel ke form ketika di klik
                    // get current row
                    var currentRow = $(this).closest('tr');

                    var kodeBarang = currentRow.find('td:eq(0)').text(); 
                    var namaBarang = currentRow.find('td:eq(1)').text();
                    var hargaBarang = currentRow.find('td:eq(2)').text();
                    var stokBarang = parseInt(currentRow.find('td:eq(3)').text());

                    // set form 
                    $("#kodeBarang").val(kodeBarang);
                    $("#namaBarang").val(namaBarang);
                    $("#hargaBarang").val(hargaBarang);
                    $("#stokBarang").val(stokBarang);
                }
            })
            // klik aktif table - end 

            // cursor tr pointer
            $("#tableBarang tbody tr").css('cursor', 'pointer');

            
        });

        
    </script>
</body>

</html>