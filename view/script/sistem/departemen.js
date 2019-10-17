$(document).ready(function(){

  $(document).on("blur", "[type=text]", function(){
    var str = $(this).val();
    str = $.trim(str).replace(/\s(?=\s)/g,'');
    str = str.substr(0,25);
    $(this).val(str);
  });

  $(document).on("click", "[type='submit']", function(e){
    e.preventDefault();
    dataForm = $("form").serializeArray();

    var namaDepartemen = $("[name=nama]").val();
    var labaDepartemen = $("[name=laba]").val();

    if (namaDepartemen == "") {
      $("[name=nama]").focus();
    }else if (labaDepartemen == "") {
      $("[name=laba]").focus();
    }
    else {
      $.ajax({
        url      :"?halaman=ajax&bag=dptbuat&base="+base,
        data     :dataForm,
        type     :"post",
        dataType :"json",
        async    :false,
        success  :function(hasil){
          $(location).attr('href', '?halaman=departemen');
        },
        error    :function(){
          $(location).attr('href', '?halaman=departemen');
        }
      });
    }
  });
});
