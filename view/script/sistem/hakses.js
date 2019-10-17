$(document).ready(function(){

  // if change value option
  $(document).on("change", ".lvl-h-aks", function(){
    // pointer ke IDuser
    var IDuser = $(this).parent().siblings().eq(0);
    IDuser.css("color", "red");

    // pointer ke tag penampung interaktif
    var tagPenampung = $(this).parent().siblings(":last");
    var isiTag = "<button type='button' class='btn btn-success aks-sbm'><i class='fas fa-save'></i></button> "+
                 "<button type='button' class='btn btn-warning aks-rst'>x</button>";
    tagPenampung.html(isiTag);
  });

  // if change value option
  $(document).on("change", ".bd-h-aks", function(){
    // pointer ke IDuser
    var IDuser = $(this).parent().siblings().eq(0);
    IDuser.css("color", "red");

    // pointer ke tag penampung interaktif
    var tagPenampung = $(this).parent().siblings(":last");
    var isiTag = "<button type='button' class='btn btn-success aks-sbm'><i class='fas fa-save'></i></button> "+
                 "<button type='button' class='btn btn-warning aks-rst'>x</button>";
    tagPenampung.html(isiTag);
  });

  // ajax if tag reset
  $(document).on("click", ".aks-rst", function(){
    var IDuser_tag = $(this).parent().siblings(":first");
    var IDuser = IDuser_tag.html();
    var IDlevel;
    var IDbasis;
    $.ajax({
      url       :"?halaman=ajax&bag=haksesreset&base="+base,
      data      :"user="+IDuser,
      type      :"post",
      dataType  :"json",
      async     :false,
      success   : function(hasil){
        $("#testing").html(hasil[0][0]);
        IDlevel = hasil[0][0];
        IDbasis = hasil[0][1];
      }
    });
    IDuser_tag.css("color", "black");
    var level_tag   = $(this).parent().parent().find(".lvl-h-aks");
    var basis_tag   = $(this).parent().parent().find(".bd-h-aks");
    var tagPenampung = $(this).parent();
    level_tag.val(IDlevel);
    basis_tag.val(IDbasis);
    tagPenampung.html("<button type='button' class='btn btn-danger aks-hps'><i class='fas fa-trash'></i></button>");
  });


  // ajax if tag submit
  $(document).on("click", ".aks-sbm", function(){
    var IDuser_tag = $(this).parent().siblings(":first");
    var IDuser     = IDuser_tag.html();
    var IDlevel    = $(this).parent().parent().find(".lvl-h-aks").val();
    var IDbasis    = $(this).parent().parent().find(".bd-h-aks").val();
    $.ajax({
      url       :"?halaman=ajax&bag=haksessubmit&base="+base,
      data      :"user="+IDuser+"&level="+IDlevel+"&basis="+IDbasis,
      type      :"post",
      dataType  :"json",
      async     :false,
      success   : function(hasil){
        $("#testing").html(hasil[0][0]);
        IDlevel = hasil[0][0];
        IDbasis = hasil[0][1];
      }
    });
    IDuser_tag.css("color", "black");
    var level_tag   = $(this).parent().parent().find(".lvl-h-aks");
    var basis_tag   = $(this).parent().parent().find(".bd-h-aks");
    var tagPenampung = $(this).parent();
    level_tag.val(IDlevel);
    basis_tag.val(IDbasis);
    tagPenampung.html("<button type='button' class='btn btn-danger aks-hps'><i class='fas fa-trash'></i></button>");
  });

  // ajax if delete
  $(document).on("click", ".aks-hps", function(){
    var IDuser = $(this).parent().siblings(":first").html();
    var trTag  = $(this).parent().parent();
    $.ajax({
      url       :"?halaman=ajax&bag=hakseshapus&base="+base,
      data      :"user="+IDuser,
      type      :"post",
      dataType  :"json",
      async     :false,
      success   : function(hasil){
        if (hasil[0][0] == "hapus sukses") {
          trTag.remove();
          $("#testing").html(hasil);
        }
      }
    });
  });

});
