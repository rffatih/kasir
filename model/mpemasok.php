<?php

class MPemasok
{
  public function baca()
  {
    $DB = new Database;
    $DB->basisdata = basisData();
    $qwr = "SELECT id_s, nama_s FROM supplier";
    $data = $DB->baca($qwr);
    return $data;
  }

  public function bacaBaris($ids)
  {
    $DB = new Database;
    $DB->basisdata = basisData();
    $qwr = "SELECT id_s, nama_s FROM supplier WHERE id_s = $ids ";
    $data = $DB->baca($qwr);
    return $data;
  }

  public function bacaId($nama)
  {
    $DB = new Database;
    $DB->basisdata = basisData();
    $qwr = "SELECT id_s, nama_s FROM supplier WHERE nama_s = '$nama' ";
    $data = $DB->baca($qwr);
    return $data;
  }

  public function tambah($nama)
  {
    $DB = new Database;
    $DB->basisdata = basisData();
    $qwr = "INSERT INTO supplier (nama_s) VALUES ('$nama')";
    $tf = $DB->eksekusi($qwr);
    if ($tf) {
      return true;
    }else {
      return false;
    }
  }

  public function edit($id, $nama)
  {
    $DB = new Database;
    $DB->basisdata = basisData();
    $qwr = "UPDATE supplier
            SET nama_s = '$nama'
            WHERE id_s = $id ";
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
    $qwr = "DELETE FROM supplier WHERE id_s = $id ";
    $tf = $DB->eksekusi($qwr);
    if ($tf) {
      return true;
    }else {
      return false;
    }
  }
}


?>
