$(document).ready(function(){

  // RESET [database tunggal]
  $("#reset").click(function (e) {
    var tf = confirm("yakin Basis Data akan di hapus ?");
    if (tf) {
      $.ajax({
        url : "?halaman=ajax&bag=bdreset&base="+base,
        type : "POST",
        dataType : "json",
        async : false, 
      }).done(function(res){
        if (res[0] == "oyi") {
          alert("Basis Data sukses di reset");
        }
      }).fail(function(xhr){
        console.log(xhr);
        
        alert("Proses Reset Basis Data gagal");
      })
    }
  });
});
