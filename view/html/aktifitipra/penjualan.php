<?php

if ($proteksi == "proteksi") {
  if ($data != null) {
    $i = 0;
    foreach ($data as $row) {
      $data[$i][0] = "<span class='klikkb' name='".$row[0]."'>".$row[0]."</span>";
      $i++;
    }
  }
}

?>
