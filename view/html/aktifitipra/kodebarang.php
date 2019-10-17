<?php

if ($proteksi == "proteksi")
{
  if ($data[0] != null) {
    $i = 0;
    foreach ($data[0] as $row) {
      $data[0][$i][0] = "<a href='?halaman=kodebarang&kodebarang=".$row[0]."'><span class='dpt-edt'>$row[0]</span></a>";
      $data[0][$i][] = "<a href='?halaman=suntingkodebarang&kodebarang=".$row[0]."'><span class='dpt-edt'>Edit</span></a>";
      $i++;
    }
  }

  if ($data[1] != null) {
    $abc = null;
    $i = 0;
    $abc = "<select class='form-control' name='id-d'>";
    foreach ($data[1] as $row) {
      $abc .= "<option value='".$data[1][$i][0]."'>".$data[1][$i][1]."</option>";
      $i++;
    }
    $abc .= "</select>";
    $data[1] = $abc;
  }
}

?>
