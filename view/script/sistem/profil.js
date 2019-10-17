$(document).ready(function(){
  // Nilai default
  var namaUserDefaul = $("#prf-nm").val();

  // Update bio (data A)
  $(document).on("click", "#prf-tbl-a", function(){
    var IDuser   = $("#prf-id").html();
    var pass     = $("#prf-aut").val();
    var namaUser = $("#prf-nm").val();
    if (pass == "") {
      $("#prf-aut").attr("placeholder", "masukkan password");
      $("#prf-aut").focus();
    }else {
      $.ajax({
        url       :"?halaman=ajax&bag=profila&base="+base,
        data      :"user="+IDuser+"&nama="+namaUser+"&pass="+pass,
        type      :"post",
        dataType  :"json",
        async     :false,
        success   : function(hasil){
          namaUserDefaul = hasil[0][0];
          $("#prf-nm").val(hasil[0][0]);
          $("#prf-aut").val("");
          $(".keterangan").html("perubahan sukses");
        },
        error     :function(){
          $("#prf-nm").val(namaUserDefaul);
          $("#prf-aut").val("");
        }
      });
    }
  });

  // Update password (data B)
  $(document).on("click", "#prf-tbl-b", function(){
    var IDuser = $("#prf-id").html();
    var pass   = $("#prf-aut").val();
    var pass1  = $("#prf-pass1").val();
    var pass2  = $("#prf-pass2").val();
    if (pass == "") {
      $("#prf-aut").attr("placeholder", "masukkan password");
      $("#prf-aut").focus();
    }else if (pass1 == "") {
      $("#prf-pass1").attr("placeholder", "masukkan password baru");
      $("#prf-pass1").focus();
    }else if (pass2 == "") {
      $("#prf-pass2").attr("placeholder", "masukkan password baru");
      $("#prf-pass2").focus();
    }else {
      $.ajax({
        url     :"?halaman=ajax&bag=profilb&base="+base,
        data    :"user="+IDuser+"&pass1="+pass1+"&pass2="+pass2+"&pass="+pass,
        type    :"post",
        dataType:"json",
        async   :false,
        success :function(hasil){
          $("#prf-pass1").val("");
          $("#prf-pass2").val("");
          $("#prf-aut").val("");
          if (hasil[0][0] == "sukses") {
            $(".keterangan").html("perubahan password sukses");
          }
          if (hasil[0][0] == "tidaksama") {
            $(".keterangan").html("password tidak sama");
          }
        },
        error   :function(){
          $("#prf-pass1").val("");
          $("#prf-pass2").val("");
          $("#prf-aut").val("");
          $(".keterangan").html("perubahan password gagal");
          $("#prf-pass1").attr("placeholder", "");
          $("#prf-pass2").attr("placeholder", "");
        }
      });
    }
  });

});
