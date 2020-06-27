<?php

if (@$proteksi == "proteksi") {
  //Lis Basis Data
  $Basis = new BAsis;
  $basisData = $Basis->baca();

  if ($data != null) {
    // HAK AKSES
    for ($i=0; $i < count($data); $i++) {
      $selected0 = null;
      $selected1 = null;
      $selected2 = null;
      switch (@$data[$i][3]) {
        case 1:
        $selected1 = "selected";
        break;
        case 2:
        $selected2 = "selected";
        break;
        default:
        $selected0 = "selected";
        break;
      }
      $data[$i][3] =
      "<select class='lvl-h-aks form-control'>
      <option value='0' $selected0 >-non aktif-</option>
      <option value='1' $selected1 >siswa</option>
      <option value='2' $selected2 >guru</option>
      </select>";

      // creat tag penampung interaktif
      $data[$i][] = "<button type='button' class='btn btn-danger aks-hps'><i class='fas fa-trash'></i></button>";

      //AKSES BASIS DATA
      global $G_DB_utama;
      $data[$i][4] = $G_DB_utama;
    }
  }
}

?>
