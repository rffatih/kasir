$(document).ready(function(){

  $(document).on("blur", "[name=nama]", function(){
    var str = $(this).val();
    str = $.trim(str).replace(/\s(?=\s)/g,'');
    str = str.substr(0,25);
    $(this).val(str);
  });

  $(document).on("click", "input[type='submit']", function(e){
    e.preventDefault();
    var dataForm = $("form").serializeArray();
    var namaPemasok = $("[name=nama]").val();

    if ( namaPemasok == "") {
      $("[name=nama]").focus();
    }else {
      $.ajax({
        url      :"?halaman=ajax&bag=pmkbuat&base="+base,
        data     :dataForm,
        type     :"post",
        dataType :"json",
        async    :false,
        success  :function(hasil){
          $(location).attr('href', '?halaman=pemasok');
        },
        error    :function(){
          $(location).attr('href', '?halaman=pemasok');
        }
      });
    }
  });
});
