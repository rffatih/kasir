<?php

if ($proteksi == "proteksi") {
  if ($data != null) {
    $i = 0;
    foreach ($data as $row) {
      $data[$i][] = "<a href='?halaman=suntingharga&kodebarang=".$row[0]."'><span class='dpt-edt'>Edit</span></a>";
      $i++;
    }
  }
}

?>
