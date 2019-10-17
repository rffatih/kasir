$(document).ready(function(){

  $(document).on("blur", "#kb", function(){
    var kodeBarang = $(this).val();
    $.ajax({
      url      :"?halaman=ajax&bag=pembeliancekkb&base="+base,
      data     :"kb="+kodeBarang,
      type     :"post",
      dataType :"json",
      async    :true,
      success  :function(hasil){
        if (hasil[0] == "oyi") {
          $("#cekkb").html("✓");
        }
      },
      error    :function(){
        $("#cekkb").html("✖");
      }
    });
  });

  $(document).on("click", "[name=pembelian-submit]", function(e){
    e.preventDefault();
    dataForm = $("form").serializeArray();

    var cekkb   = $("#cekkb").html();
    var cekn    = $("#n").val();
    var cekrp   = $("#rp").val();
    var cekid_s = $("#id-s").val();

    if (cekkb == "✖" || cekkb == "?") {
      $("input[name=kb]").focus();
      $("#keterangan").html("Kode Barang salah");
    }else if (cekn == "" || cekn <= 0) {
      $("input[name=n]").focus();
      $("#keterangan").html("Jumlah tersebut tidak diperbolehkan");
    }else if (cekrp == "" || cekrp < 0) {
      $("input[name=rp]").focus();
      $("#keterangan").html("Harga tidak boleh kosong");
    }else if (cekid_s == undefined) {
      $("#keterangan").html("Supplier tidak valid");
    }else {
      $.ajax({
        url      :"?halaman=ajax&bag=barangmasuk&base="+base,
        data     :dataForm,
        type     :"post",
        dataType :"json",
        async    :true,
        success  :function(hasil){
          alert("Transaksi sukses");
          $(location).attr('href', '?halaman=pembelian');
        },
        error    :function(){
          $("#keterangan").html("Fatal Error!!! periksa manual Data FLow Anda, kemungkinan BESAR basisdata RUSAK");
        }
      });
    }
  });
});
