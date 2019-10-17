<?php

if ($proteksi == "proteksi") {
  if ($data != null) {
    $i = 0;
    foreach ($data as $row) {
      $data[$i][] = "<span class='bsd-hps'>Hapus</span>";
      $i++;
    }
  }
}

?>
