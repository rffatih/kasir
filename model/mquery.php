<?php

class MQuery
{
  public function persediaan()
  {
    $Conn = new Database;
    $Conn->basisdata = basisData();

    $qwr  = "SELECT k.kode_barang,  kb.nama_kb, k.jumlah_ka FROM karung k
             INNER JOIN kode_barang kb ON k.kode_barang = kb.kode_barang
             ORDER BY k.kode_barang ASC";
    $data = $Conn->baca($qwr);
    return $data;
  }

  public function harga()
  {
    $Conn = new Database;
    $Conn->basisdata = basisData();

    $qwr  = "SELECT * FROM harga";
    $data = $Conn->baca($qwr);
    return $data;
  }

  public function fifo($a, $n)
  {
    $Conn = new Database;
    $Conn->basisdata = basisData();

    $qwrA  = "SELECT
              kode_barang, nama_kb, petugas_bm, nama_s, tanggal_bm, jumlah_bm, rptotal_bm
              FROM barang_masuk";
    $qwrF  = $qwrA.tambahLimit($a, $n);

    $data["data"] = $Conn->baca($qwrF);
    $data["sbh"] = $qwrA;

    return $data;
  }

  public function bukuNota($a, $n)
  {
    $Conn = new Database;
    $Conn->basisdata = basisData();

    $qwrA = "SELECT * FROM nota ORDER BY time_stamp DESC";
    $qwrF = $qwrA.tambahLimit($a, $n);
    $data["data"] = $Conn->baca($qwrF);
    $data["sbh"]  = $qwrA;
    return $data;
  }

  public function penjualan()
  {
    $Conn = new Database;
    $Conn->basisdata = basisData();

    $qwr = "SELECT kb.kode_barang, kb.nama_kb, kb.satuan_kb, h.rpjual_h
            FROM kode_barang kb
            INNER JOIN harga h
            ON kb.kode_barang = h.kode_barang
            ORDER BY kb.kode_barang ASC";
    $data = $Conn->baca($qwr);
    return $data;
  }

  public function bukuRekab($kodeBarang, $a, $n)
  {
    $Conn = new Database;
    $Conn->basisdata = basisData();

    $qwrA = "SELECT kode_barang, jumlah_bm, rptotal_bm, '-' AS A, '-' AS B, time_stamp FROM barang_masuk WHERE kode_barang = '$kodeBarang'
            UNION
            SELECT kode_barang, '-', '-', jumlah_bk, rptotal_bk, time_stamp FROM barang_keluar WHERE kode_barang = '$kodeBarang'
            ORDER BY time_stamp ASC";
    $qwrF = $qwrA.tambahLimit($a, $n);

    $data["data"] = $Conn->baca($qwrF);
    $data["sbh"]  = $qwrA;
    return $data;
  }

  public function perNota($nomor)
  {
    $Conn = new Database;
    $Conn->basisdata = basisData();

    $qwr = "SELECT * FROM nota WHERE id_n = $nomor ";
    $data["nomornota"] = $Conn->baca($qwr);

    $qwr = "SELECT kode_barang, nama_kb, jumlah_bk, satuan_kb, rphargasatuan_bk, rptotal_bk
            FROM barang_keluar WHERE id_n = $nomor";
    $data["isinota"] = $Conn->baca($qwr);

    return $data;
  }
}


?>
