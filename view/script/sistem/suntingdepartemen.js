$(document).ready(function(){

  $(document).on("blur", "[type=text]", function(){
    var str = $(this).val();
    str = $.trim(str).replace(/\s(?=\s)/g,'');
    str = str.substr(0,25);
    $(this).val(str);
  });

  $(document).on("blur", "input[name='nama']", function(){
    $("#testing").html("");
  });

  $(document).on("blur", "input[name='laba']", function(){
    $("#testing").html("");
  });

  $(document).on("click", "input[name='simpan']", function(e){
    e.preventDefault();
    dataForm = $("form").serializeArray();

    var namaDepartemen = $("input[name='nama']").val();
    var labaDepartemen = $("input[name='laba']").val();

    if (namaDepartemen == "") {
      $("input[name='nama']").attr("placeholder", "Jangan kosong");
      $("input[name='nama']").focus();
    }else if (labaDepartemen == "") {
      $("input[name='laba']").attr("placeholder", "Jangan kosong");
      $("input[name='laba']").focus();
    }else {
      $.ajax({
        url      :"?halaman=ajax&bag=dptsunting&base="+base,
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
    var idDepartemen = $("[name=id-d]").val();
    $.ajax({
      url      :"?halaman=ajax&bag=dpthapus&base="+base,
      data     :"id-d="+idDepartemen,
      type     :"post",
      dataType :"json",
      async    :false,
      success  :function(hasil){
        $(location).attr('href', '?halaman=departemen');
      },
      error    :function(){
        $("#testing").html("gagal");
      }
    });
  });
});
