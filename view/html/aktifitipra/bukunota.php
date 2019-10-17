<?php

if ($proteksi == "proteksi") {
  if ($data["data"] != null) {
    $i = 0;
    foreach ($data["data"] as $row) {
      $row[1] = "<a href='?halaman=bukunota&nomor=$row[0]&a=".@$_REQUEST["a"]."'><span class='dpt-edt'>$row[1]</span></a>";
      $row[2] = tanggalPrint($row[2]);

      unset($row[0]);
      unset($row[5]);
      unset($row[6]);
      unset($row[8]);
      $data["data"][$i] = array_values($row);
      $i++;
    }
  }
}

?>
