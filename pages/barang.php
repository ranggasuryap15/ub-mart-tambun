<!DOCTYPE html>
<html lang="en">

<head>
    <title>Barang</title>
</head>

<body class="">
    <div class="row container-fluid mt-5">
        <section class="col-5">
            <div class="container text-bg-light rounded-5 p-4 ">
                <h3 class="text-center border-bottom mb-5">Input Barang</h3>
                <form action="">
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label fs-5">Kode Barang</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" id="inputKodeBarang" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label fs-5">Nama Barang</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" id="inputNamaBarang">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label fs-5">Harga Pokok</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputHargaPokok">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label fs-5">Harga Jual</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputHargaJual">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label fs-5">Stock Barang</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="inputStockBarang">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="col-sm-3 col-form-label fs-5">Profit</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" id="potonganProfit">
                        </div>
                    </div>
                    <input class="btn btn-primary btn-lg rounded-pill my-4" type="button" value="Tambah">
                </form>
            </div>
        </section>
        <section class="col-7">
            <div class="container text-bg-light rounded-5 p-3">
                <h3 class="text-center border-bottom mb-5">Data Barang</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col-2" class="text-center">Kode Barang</th>
                            <th scope="col-3" class="text-center">Nama Barang</th>
                            <th scope="col-2" class="text-center">Harga Pokok</th>
                            <th scope="col-2" class="text-center">Harga Jual</th>
                            <th scope="col-1" class="text-center">Stock Barang</th>
                            <th scope="col-2" class="text-center">Profit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="col-2" class="text-center">row</th>
                            <th scope="col-3" class="text-center">Detergen</th>
                            <th scope="col-2" class="text-center">Rp. 8.000</th>
                            <th scope="col-2" class="text-center">Rp. 10.000</th>
                            <th scope="col-1" class="text-center">row</th>
                            <th scope="col-2" class="text-center">Rp. 2.000</th>
                        </tr>
                        <tr>
                            <th scope="col-2" class="text-center">row</th>
                            <th scope="col-3" class="text-center">Detergen</th>
                            <th scope="col-2" class="text-center">Rp. 8.000</th>
                            <th scope="col-2" class="text-center">Rp. 10.000</th>
                            <th scope="col-1" class="text-center">row</th>
                            <th scope="col-2" class="text-center">Rp. 2.000</th>
                        </tr>
                        <tr>
                            <th scope="col-2" class="text-center">row</th>
                            <th scope="col-3" class="text-center">Detergen</th>
                            <th scope="col-2" class="text-center">Rp. 8.000</th>
                            <th scope="col-2" class="text-center">Rp. 10.000</th>
                            <th scope="col-1" class="text-center">row</th>
                            <th scope="col-2" class="text-center">Rp. 2.000</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>

</html>