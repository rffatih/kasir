$(document).ready(function(){

  // validasi input
  $('#input-db').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
      return true;
    }
    e.preventDefault();
    return false;
  });

  // Create BASIS DATA
  $(document).on("click", "input[type='submit']", function(){
    $(".keterangan").html("");
    var namaBD = $("#input-db").val();
    if (namaBD == "") {
      $(".keterangan").html("<i>input kosong</i>");
    } else {
      var trAll = $(".bsd-hps").parent().siblings();
      var cek = "beda";
      $.each(trAll, function(i, val){
        if (namaBD.toUpperCase() == trAll.eq(i).html().toUpperCase()) {
          cek = "sama";

        }
      });
      if (cek == "beda") {
        $.ajax({
          url      :"?halaman=ajax&bag=bdbuat&base="+base,
          data     :"bd="+namaBD,
          type     :"post",
          dataType :"json",
          async    :false,
          beforeSend:function(){
            // $(".keterangan").html("sedang proses...");
          },
          success  :function(hasil){
            if (hasil[0] == "oyi") {
              alert("Basis Data baru telah siap");
              $(location).attr('href', '?halaman=basisdata');
            }
          }
        });
      } else {
        $(".keterangan").html("<i>Basis Data</i> <b>'"+namaBD+"'</b> sudah ada");
        $("#input-db").val("");
      }
    }
  });

  // DELETE BASIS DATA
  $(document).on("click", ".bsd-hps", function(){
    var tagInduk = $(this).parent().parent();
    var namaBD   = $(this).parent().siblings(":first").html();
    $.ajax({
      url      :"?halaman=ajax&bag=bdhapus&base="+base,
      data     :"bd="+namaBD,
      type     :"post",
      dataType :"json",
      async    :false,
      success  :function(hasil){
        if (hasil[0] == "oyi") {
          tagInduk.remove();
        }
      }
    });
  });

});
