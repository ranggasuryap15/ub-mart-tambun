<!DOCTYPE html>
<html lang="en">

<head>
    <title>Barang</title>
</head>

<body class="text-bg-secondary">
    <div class="row container-fluid mt-5">
        <section class="col-5">
            <div class="container text-bg-light rounded-5 p-4 ">
                <h3 class="text-center border-bottom mb-5">Input Barang</h3>
                <form action="">
                    <div class="mb-3 row">
                        <label for="" class="col-form-label fs-5">Kode Barang</label>
                        <div class="input-group">
                            <input type="text" readonly class="form-control" id="kodeBarang" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-form-label fs-5">Nama Barang</label>
                        <div class="input-group">
                            <input type="text" readonly class="form-control" id="namaBarang" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-form-label fs-5">Harga Barang</label>
                        <div class="input-group">
                            <input type="text" readonly class="form-control" id="hargaBarang" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-form-label fs-5">Stok Barang</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="stokBarang" value="">
                        </div>
                    </div>
                    <input class="btn btn-primary btn-lg rounded-pill my-4" type="button" value="Tambah">
                </form>
            </div>
        </section>
        <section class="col-7">
            <div class="container text-bg-light rounded-5 p-3">
                <h3 class="text-center border-bottom mb-5">Data Barang</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col-2" class="text-center">Kode Barang</th>
                                <th scope="col-3" class="text-center">Nama Barang</th>
                                <th scope="col-2" class="text-center">Harga Barang</th>
                                <th scope="col-1" class="text-center">Stok Barang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="col-2" class="text-center">row</th>
                                <th scope="col-3" class="text-center">Detergen</th>
                                <th scope="col-2" class="text-center">Rp. 8.000</th>
                                <th scope="col-1" class="text-center">row</th>
                            </tr>
                            <tr>
                                <th scope="col-2" class="text-center">row</th>
                                <th scope="col-3" class="text-center">Detergen</th>
                                <th scope="col-2" class="text-center">Rp. 8.000</th>
                                <th scope="col-1" class="text-center">row</th>
                            </tr>
                            <tr>
                                <th scope="col-2" class="text-center">row</th>
                                <th scope="col-3" class="text-center">Detergen</th>
                                <th scope="col-2" class="text-center">Rp. 8.000</th>
                                <th scope="col-1" class="text-center">row</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</body>

</html>