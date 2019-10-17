<?php

if ($proteksi == "proteksi") {
  if ($data["data"] != null) {
    $i = 0;
    foreach ($data["data"] as $row) {
      $data["data"][$i][5] = tanggalPrint($row[5]);
      $i++;
    }
  }
}

?>
