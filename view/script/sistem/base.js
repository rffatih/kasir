var base;
$(document).ready(function(){
  // GET halaman
  var fbase = {};
  document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
    function decode(s) {
      return decodeURIComponent(s.split("+").join(" "));
    }
    fbase[decode(arguments[1])] = decode(arguments[2]);
  });
  base = fbase["halaman"];
});
