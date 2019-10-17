<?php

if ($proteksi == "proteksi") {
  if ($data["pemasok"] != null) {
    $abc = null;
    $abc = "<select name='id-s' id='id-s' class='form-control'>";
    foreach ($data["pemasok"] as $row) {
      $abc .= "<option value='$row[0]'>$row[1]</option>";
    }
    $abc .= "</select>";
    $data["pemasok"] = $abc;
  }
}

?>
