<?php

class MHarga
{
  public function bacaPerKodeBarang($kodeBarang)
  {
    $DB = new Database;
    $DB->basisdata = basisData();
    $qwr = "SELECT kode_barang, rppokok_h, rpjual_h FROM harga WHERE kode_barang = '$kodeBarang' ";
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

  public function editHarga($kodeBarang, $hPokok, $hJual)
  {
    $DB = new Database;
    $DB->basisdata = basisData();
    $qwr = "UPDATE harga
            SET rpjual_h = $hJual
            WHERE kode_barang = '$kodeBarang' ";
    $tf = $DB->eksekusi($qwr);
    if ($tf) return true;
    else return false;
  }
}


?>
