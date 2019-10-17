<?php

class Departemen
{
  public function baca()
  {
    $DB = new Database;
    $DB->basisdata = basisData();
    $qwr = "SELECT id_d, nama_d, laba_d FROM departemen";
    $data = $DB->baca($qwr);
    return $data;
  }

  public function bacaBaris()
  {
    $nama = formatQuery($_REQUEST["nama"]);
    $DB = new Database;
    $DB->basisdata = basisData();
    $qwr = "SELECT id_d, nama_d, laba_d FROM departemen WHERE nama_d = '$nama' ";
    $data = $DB->baca($qwr);
    return $data;
  }

  public function tambah($nama, $laba)
  {
    $DB = new Database;
    $DB->basisdata = basisData();
    $qwr = "INSERT INTO departemen (nama_d, laba_d)
            VALUES ('$nama', $laba)";
    $tf = $DB->eksekusi($qwr);
    if ($tf) {
      return true;
    }else {
      return false;
    }

  }

  public function edit($id, $nama, $laba)
  {
    $DB = new Database;
    $DB->basisdata = basisData();
    $qwr = "UPDATE departemen
            SET nama_d = '$nama', laba_d = $laba
            WHERE id_d = $id ";
    $tf = $DB->eksekusi($qwr);
    if ($tf) {
      return true;
    }else {
      return false;
    }
  }

  public function hapus($id)
  {
    $DB = new Database;
    $DB->basisdata = basisData();
    $qwr = "DELETE FROM departemen WHERE id_d = $id ";
    $tf = $DB->eksekusi($qwr);
    if ($tf) {
      return true;
    }else {
      return false;
    }
  }
}


?>
