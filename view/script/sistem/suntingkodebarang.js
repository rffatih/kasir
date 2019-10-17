$(document).ready(function(){

  $(document).on("blur", "[type=text]", function(){
    var str = $(this).val();
    str = $.trim(str).replace(/\s(?=\s)/g,'');
    str = str.substr(0,25);
    $(this).val(str);
  });

  $(document).on("blur", "input", function(){
    $("#testing").html("");
  });

  $(document).on("click", "input[name='simpan']", function(e){
    e.preventDefault();
    dataForm = $("form").serializeArray();

    var namaBarang   = $("[name=nama]").val();
    var satuanBarang = $("[name=satuan]").val();

    if (namaBarang == "") {
      $("input[name=nama]").attr("placeholder", "Jangan kosong");
      $("input[name=nama]").focus();
    }else if (satuanBarang == "") {
      $("input[name=satuan]").attr("placeholder", "Jangan kosong");
      $("input[name=satuan]").focus();
    }else {
      $.ajax({
        url      :"?halaman=ajax&bag=kbsunting&base="+base,
        data     :dataForm,
        type     :"post",
        dataType :"json",
        async    :false,
        success  :function(hasil){
          $("#testing").html("sukses");
        },
        error    :function(){
          $("#testing").html("gagal");
        }
      });
    }
  });

  $(document).on("click", "input[name=hapus]", function(e){
    e.preventDefault();
    dataForm = $("form").serializeArray();
    
    $.ajax({
      url      :"?halaman=ajax&bag=kbhapus&base="+base,
      data     :dataForm,
      type     :"post",
      dataType :"json",
      async    :false,
      success  :function(hasil){
        $(location).attr('href', '?halaman=kodebarang');
      },
      error    :function(){
        $("#testing").html("gagal");
      }
    });
  });
});
