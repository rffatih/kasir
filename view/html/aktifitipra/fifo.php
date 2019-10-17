<?php

if ($proteksi == "proteksi") {
  if ($data["data"] != null) {
    $i = 0;
    foreach ($data["data"] as $row) {
      $data["data"][$i][4] = tanggalPrint($row[4]);
      $i++;
    }
  }
}

?>
