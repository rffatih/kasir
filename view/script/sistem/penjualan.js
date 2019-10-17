$(document).ready(function(){

  $.fn.tanggalPukul = function(){
    var tanggalpukul = new Date();
    var jam   = tanggalpukul.getHours();
    var menit = tanggalpukul.getMinutes();
    var detik = tanggalpukul.getSeconds();
    var hari  = tanggalpukul.getDay();
    var tanggal = tanggalpukul.getDate();
    var bulan = tanggalpukul.getMonth();
    var tahun = tanggalpukul.getFullYear();

    jam   = ("0" + jam).slice(-2);
    menit = ("0" + menit).slice(-2);
    detik = ("0" + detik).slice(-2);
    switch (bulan) {
      case 0:
        bulan = "Januari";
        break;
      case 1:
        bulan = "Februari";
        break;
      case 2:
        bulan = "Maret";
        break;
      case 3:
        bulan = "April";
        break;
      case 4:
        bulan = "Mei";
        break;
      case 5:
        bulan = "Juni";
        break;
      case 6:
        bulan = "Juli";
        break;
      case 7:
        bulan = "Agustus";
        break;
      case 8:
        bulan = "September";
        break;
      case 9:
        bulan = "Oktober";
        break;
      case 10:
        bulan = "November";
        break;
      case 11:
        bulan = "Desember";
        break;
      default:
    }
    switch (hari) {
      case 0:
        hari = "Minggu";
        break;
      case 1:
        hari = "Senin";
        break;
      case 2:
        hari = "Selasa";
        break;
      case 3:
        hari = "Rabu";
        break;
      case 4:
        hari = "Kamis";
        break;
      case 5:
        hari = "Jum'at";
        break;
      case 6:
        hari = "Sabtu";
        break;
      default:
    }

    var format = hari+", "+tanggal+" "+bulan+" "+tahun+" "+jam+":"+menit+":"+detik;
    $(this).html(format);
  } // </ tanggalPukul()

  $.fn.setnilai = function(n, kb){
    var targetLis = "[name="+kb+"]";

    var colSatuan = $(this).parent().siblings(".satuan");
    var colNama = $(this).parent().siblings(".nama");
    var colHarga = $(this).parent().siblings(".harga");
    var colTotal = $(this).parent().siblings(".total");
    var colHargaDatin = $(this).parent().siblings(".harga-data-input");
    var colTotalDatin = $(this).parent().siblings(".total-data-input");

    var nama = $(targetLis).parent().siblings().eq(0).html();
    var satuan = $(targetLis).parent().siblings().eq(1).html();
    var harga = $(targetLis).parent().siblings().eq(2).html();
    var total = Number(n) * Number(harga);

    if (n == null) {
      $(this).val(null);
      colNama.html(null);
      colSatuan.html(null);
      colHarga.html(null);
      colHargaDatin.val(null);
      colTotal.html(null);
      colTotalDatin.val(null);
    }else {
      $(this).val(n);
      colNama.html(nama);
      colSatuan.html(satuan);
      colHarga.html(harga);
      colHargaDatin.val(harga);
      colTotal.html(total);
      colTotalDatin.val(total);
    }

    var colTotalSemua = $("#pembayaran");
    var colPembayaranDatin = $("#pembayaran-datin");
    var totalSemua = 0;
    $(".total").each(function(){
      var y = $(this).html();
      totalSemua += Number(y);
    });
    colTotalSemua.html(totalSemua);
    colPembayaranDatin.val(totalSemua);
  } // </ setnilai()

// ===Tanggal===
  $("#tgl").tanggalPukul();
  setInterval(function(){
    $("#tgl").tanggalPukul();
  }, 1000);

// ===EVENT pada TYPE TEXT===
  $(document).on("blur", "[type=text]", function(){
    var str = $(this).val();
    str = $.trim(str).replace(/\s(?=\s)/g,'');
    str = str.substr(0,25);
    $(this).val(str);
  });

// ===EVENT pada CLICK TAMBAH BARIs ===
var baris =
'<tr class="target-nota-js">'+
  '<td class="in-0"><input type="text" name="kode-barang[]" class="kode-matic form-control"></td>'+
  '<td class="in-1"><input type="number" name="jumlah-barang[]" class="jumlah-matic form-control" min="0"></td>'+
  '<td class="satuan"></td>'+
  '<td class="nama"></td>'+
  '<td class="harga"></td>'+
  '<td class="total"></td>'+
  '<input type="hidden" name="harga[]" class="harga-data-input">'+
  '<input type="hidden" name="total[]" class="total-data-input">'+
'</tr>';
  $(document).on("click", "#tambah-baris", function(){
    $(this).parent().before(baris);
  });

// ===EVENT pada CLICK KLIKKB===
  $(document).on("click", ".klikkb", function(){
    var kb = $(this).html();
    var selectBaris = $(".kode-matic");
    var inputJumlah, n, ketemu = "belum", tambahBaris = "ya";
    $.each(selectBaris, function(index) {
      inputJumlah = selectBaris.eq(index).parent().siblings(".in-1").children();

      if (kb == selectBaris.eq(index).val()) {
        n = Number(inputJumlah.val()) + 1;
        inputJumlah.setnilai(n, kb);
        ketemu = "sudah";
        return false;
      }
    });

    if (ketemu == "belum") {
      selectBaris.each(function(index){
        inputJumlah = selectBaris.eq(index).parent().siblings(".in-1").children();
        if ($(this).val() == "") {
          $(this).val(kb);
          inputJumlah.setnilai(1, kb);
          tambahBaris = "tidak";
          return false;
        }
      });

      if (tambahBaris == "ya") {
        $("#tambah-baris").parent().before(baris);
        var inx = $(".target-nota-js").length;
        inx -= 1;
        $(".target-nota-js").eq(inx).children(".in-0").children().val(kb);
        $(".target-nota-js").eq(inx).children(".in-1").children().setnilai(1, kb);
      }
    }
  });

// ===EVENT pada KODE-MATIC===
  $(document).on("blur", ".kode-matic", function(){
    var kode = $(this).val();
    var valid = "belum", dublikasi;

    if (kode == ""){
      inputJumlah = $(this).parent().siblings(".in-1").children();
      inputJumlah.setnilai(null);
    } else {
      // Validasi
      $(".klikkb").each(function(){
        if(kode == $(this).html()){
          valid = "iya";
          return false;
        }
      });
      // Cegah Dublikasi
      var barisLain = $(this).parent().parent().siblings(".target-nota-js").children(".in-0").children();
      barisLain.each(function(){
        if ($(this).val() == kode) {
          dublikasi = "iya";
          valid = "tidak";
          $(this).focus();
          return false;
        }
      });
      // gerakan default
      jumlahMatic = $(this).parent().siblings(".in-1").children(".jumlah-matic");
      if (valid != "iya" || dublikasi == "iya") {
        $(this).val(null);
        jumlahMatic.setnilai(null);
      } else {
        jumlahMatic.setnilai(1, kode);
      }
    }
  });

// ===EVENT pada JUMLAH-MATIC===
  $(document).on("input", ".jumlah-matic", function(){
    var kb = $(this).parent().siblings(".in-0").children(".kode-matic").val();
    var n  = $(this).val();
    if (kb != "") {
      $(this).setnilai(n, kb);
    }
  });

// ===EVENT pada JUMLAH-MATIC===
  $(document).on("blur", ".jumlah-matic", function(){
    var kb = $(this).parent().siblings(".in-0").children(".kode-matic").val();
    if (kb == "") {
      $(this).val(null);
    }
  });

// EVENT SUBMIT
  $(document).on("click", "[name=submit]", function(e){
    e.preventDefault();

    var noNota = $("#no-nota").val();
    var yth    = $("#yth").val();

    if (noNota == "") {
      $("#no-nota").focus();
    }else if (yth == "") {
      $("#yth").focus();
    }else {

      $(".kode-matic").each(function(){
        if ($(this).val() == "") {
          $(this).parent().parent().remove();
        }
      });
      dataForm = $("form").serializeArray();

      $.ajax({
        url      :"?halaman=ajax&bag=penjualan&base="+base,
        data     :dataForm,
        type     :"post",
        dataType :"json",
        async    :true,
        success  :function(hasil){
          if (hasil[0] == "oyi") {
            alert("Transaksi sukses");
            $("#kertas-nota").html(kertasNota);
          }
        },
        error    :function(){
          alert("Fatal Error!!! periksa manual Data FLow Anda, kemungkinan BESAR basisdata RUSAK");
        }
      });
    }
  });
})
