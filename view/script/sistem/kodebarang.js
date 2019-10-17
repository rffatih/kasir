$(document).ready(function(){

  $(document).on("blur", "[type=text]", function(){
    var str = $(this).val();
    str = $.trim(str).replace(/\s(?=\s)/g,'');
    str = str.substr(0,25);
    $(this).val(str);
  });

  $(document).on("click", "input[type='submit']", function(e){
    e.preventDefault();
    dataForm = $("form").serializeArray();

    var kodeBarang   = $("[name='kodebarang']").val();
    var namaBarang   = $("[name='nama']").val();
    var satuanBarang = $("[name='satuan']").val();
    var idD          = $("[name='id-d']").val();

    if (kodeBarang == "") {
      $("[name='kode-kb']").focus();
    }else if (namaBarang == "") {
      $("[name='nama-kb']").focus();
    }else if (satuanBarang == "") {
      $("[name='satuan-kb']").focus();
    }else if (idD == undefined) {
      $("input[type=submit]").remove();
    }else {
      $.ajax({
        url      :"?halaman=ajax&bag=kbbuat&base="+base,
        data     :dataForm,
        type     :"post",
        dataType :"json",
        async    :false,
        success  :function(hasil){
          $(location).attr('href', '?halaman=kodebarang');
        },
        error    :function(){
          $(location).attr('href', '?halaman=kodebarang');
        }
      });
    }
  });
});
