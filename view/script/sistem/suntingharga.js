$(document).ready(function(){
  $(document).on("blur", "[type=text]", function(){
    var str = $(this).val();
    str = $.trim(str).replace(/\s(?=\s)/g,'');
    str = str.substr(0,25);
    $(this).val(str);
  });

  $(document).on("blur", "input[name='rpjual-h']", function(){
    $("#testing").html("");
  });

  $(document).on("click", "input[name='simpan']", function(e){
    e.preventDefault();
    dataForm = $("form").serializeArray();

    var hargaJual = $("input[name='rpjual-h']").val();
    
    if (hargaJual == "") {
      $("input[name='rpjual-h']").attr("placeholder", "Jangan kosong");
      $("input[name='rpjual-h']").focus();
    } else {
      $.ajax({
        url      :"?halaman=ajax&bag=hsunting&base="+base,
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
});
  