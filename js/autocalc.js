$(document).ready(function(){
    // Get value on keyup funtion
    $("#hargaBarangTransaksi, #jumlahBarangTransaksi").keyup(function(){

    var total=0;    	
    var x = Number($("#hargaBarangTransaksi").val());
    var y = $("#jumlahBarangTransaksi").val();
    var total = x * y;  

    $('#subTotalTransaksi').val(total);

});
});