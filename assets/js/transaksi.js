// Halaman Transaksi
$(document).ready(function() {

    // kode barang input search data barang
    $("#kodeBarangTransaksi").keypress(function(event) {
        // jika field kodeBarangTransaksi ditekan enter maka akan muncul
        if (event.keyCode == 13 && event.target.value!="") {
            var kodeBarang = this.value; // input dari form
            var url = "/ub-mart-tambun/App/Util/load-barang-barcode.php"; // url json from mysql
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

                            // max length
                            if (this.value.length > 4) {
                                this.value = this.value.slice(0,4);
                            }
                        });
                    }
                });
            });
        }     
    });

    $('#qtyTransaksi').on('keypress', function() {
        limitText(this, 10)
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

    // table struk temp
    setInterval(function() {
        table();
    }, 1000);
    window.onload = table;

    function table() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tableStruk").innerHTML = this.responseText;
            } 
        };
        xhttp.open("GET", "/ub-mart-tambun/App/Util/load-table-struk-temp.php", true);
        xhttp.send();
    }
});


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
