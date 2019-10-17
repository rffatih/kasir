$(document).ready(function(){

  $(document).on("blur", "[name=nama]", function(){
    $("#testing").html("");
    var str = $(this).val();
    str = $.trim(str).replace(/\s(?=\s)/g,'');
    str = str.substr(0,25);
    $(this).val(str);
  });

  $(document).on("click", "input[name='simpan']", function(e){
    e.preventDefault();
    var dataForm = $("form").serializeArray();

    var namaPemasok = $("[name=nama]").val();

    if (namaPemasok == "") {
      $("input[name='nama']").attr("placeholder", "Jangan kosong");
      $("input[name='nama']").focus();
    } else {
      $.ajax({
        url      :"?halaman=ajax&bag=pmksunting&base="+base,
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

  $(document).on("click", "[name=hapus]", function(e){
    e.preventDefault();

    var idPemasok = $("[name=id-p]").val();
    $.ajax({
      url      :"?halaman=ajax&bag=pmkhapus&base="+base,
      data     :"&id="+idPemasok,
      type     :"post",
      dataType :"json",
      async    :false,
      success  :function(hasil){
        $(location).attr('href', '?halaman=pemasok');
      },
      error    :function(){
        $("#testing").html("gagal");
      }
    });
  });
});
