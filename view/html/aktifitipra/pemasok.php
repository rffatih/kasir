<?php

if ($proteksi == "proteksi") {
  if ($data != null) {
    $i = 0;
    foreach ($data as $row) {
      $data[$i][0] = $data[$i][1];
      $data[$i][1] = "<a href='?halaman=suntingpemasok&id=".$row[0]."'><span class='dpt-edt'>Edit</span></a>";
      $i++;
    }
  }
}

?>
