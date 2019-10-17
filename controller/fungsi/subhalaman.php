<?php

function subHalaman($sbh)
{
  $qwr = $sbh["qwr"];
  $a   = $sbh["a"];
  $n   = $sbh["n"];
  $h   = $sbh["h"];

  $Conn = new Database;
  $Conn->basisdata = basisData();
  $totBaris = $Conn->baca("SELECT COUNT(*) FROM ($qwr) AS tabel");
  $totBaris = $totBaris[0][0];
  $totsub   = ceil($totBaris / $n);

  // indek tertulis dari var x sampai var y
  $x = $a - 1;
  $y = $a + 1;
  if ($x <= 0) { $x = 1; }
  if ($y >= $totsub) { $y = $totsub; }

  echo "<nav> <ul class='pagination'>";
  if ($x != $y) {
    if ($x != 1) {
      echo "<li class='page-item'><a class='page-link' href='$h'>&laquo;</a></li>";
    }
    for ($i=$x; $i <= $y; $i++) {
      if ($i == $a) {
        echo "<li class='page-item active'><a class='page-link' href='$h&a=$i'>$i</a></li>";
      }else {
        echo "<li class='page-item'><a class='page-link' href='$h&a=$i'>$i</a></li>";
      }
    }
    if ($y != $totsub) {
      echo "<li class='page-item'><a class='page-link' href='$h&a=$totsub'>&raquo;</a></li>";
    }
  }
  echo "</ul> </nav>";


}

?>
