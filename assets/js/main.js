// $(document).ready(function() {
//     setInterval(timestamp, 1000);
// });

// function timestamp() {
//     $.ajax({
//         url: 'http://localhost/timestamp.php',
//         success: function(data) {
//             $('#timestamp').html(data);
//         },
//     });
// }

// format rupiah
var input = document.getElementById('transaksiBayar');
input.addEventListener('keyup', function(e)
{
    var number_string = bilangan.replace(/[^,\d]/g, '').toString(),
        split	= number_string.split(','),
        sisa 	= split[0].length % 3,
        rupiah 	= split[0].substr(0, sisa),
        ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);
        
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
});

// Halaman Transaksi
$(document).ready(function() {
    $("#kodeBarangTransaksi").keypress(function(event) {
        // jika field kodeBarangTransaksi ditekan enter maka akan muncul
        if (event.keyCode == 13 && event.target.value!="") {
            var kodeBarang = this.value; // input dari form
            var url = "/ub-mart-tambun/App/Util/load-barang-barcode.php";
            var harga = document.querySelector("#hargaTransaksi").value;
            var expression = new RegExp(kodeBarang, "i"); // searching live

            $.getJSON(url, function(data) {
                $.each(data, function(key, value) {
                    if (value.kode_barang.search(expression) != -1) {
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
                        });
                    }
                });
            });
        }     
    });

    // reset form
    $("#kodeBarangTransaksi").on('input', function(event){
        if (event.target.value=="") {
            $("#namaBarangTransaksi").val("");
            $("#hargaTransaksi").val("");
            $("#qtyTransaksi").val("");
            $("#subTotalTransaksi").val("");
        }
    });
});