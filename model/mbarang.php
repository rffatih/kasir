<?php

class MBarang
{
  public function buatKodeBarang($kodeBarang, $nama, $satuan, $id_d)
  {
    $DB = new Database;
    $DB->basisdata = basisData();
    // Tabel kode_barang
    $qwr = "INSERT INTO kode_barang (kode_barang, nama_kb, satuan_kb, id_d)
            VALUES ('$kodeBarang', '$nama', '$satuan', '$id_d')";
    $tf1 = $DB->eksekusi($qwr);
    // Tabel karung
    $qwr = "INSERT INTO karung (kode_barang, jumlah_ka)
            VALUES ('$kodeBarang', 0)";
    $tf2 = $DB->eksekusi($qwr);
    // Tabel harga
    $qwr = "INSERT INTO harga (kode_barang, rppokok_h, rpjual_h)
            VALUES ('$kodeBarang', 0, 0)";
    $tf3 = $DB->eksekusi($qwr);
    if ($tf1 == true AND $tf2 == true AND $tf3 == true) {
      return true;
    }else {
      return false;
    }
  }

  public function baca()
  {
    $DB = new Database;
    $DB->basisdata = basisData();
    $qwr = "SELECT kb.kode_barang, kb.nama_kb, kb.satuan_kb, d.nama_d FROM kode_barang kb
            INNER JOIN departemen d ON kb.id_d = d.id_d";
    $data = $DB->baca($qwr);
    return $data;
  }

  public function bacaBaris($kodeBarang)
  {
    $DB = new Database;
    $DB->basisdata = basisData();
    $qwr = "SELECT kb.kode_barang, kb.nama_kb, kb.satuan_kb, d.nama_d FROM kode_barang kb
            INNER JOIN departemen d ON kb.id_d = d.id_d
            WHERE kb.kode_barang = BINARY '$kodeBarang' ";
    $data = $DB->baca($qwr);
    return $data;
  }

  public function edit($kodeBarang, $nama, $satuan, $id_d)
  {
    $DB = new Database;
    $DB->basisdata = basisData();
    $qwr = "UPDATE kode_barang
            SET kode_barang = '$kodeBarang',
                nama_kb     = '$nama',
                satuan_kb   = '$satuan',
                id_d        = $id_d
            WHERE kode_barang = '$kodeBarang' ";
    $tf = $DB->eksekusi($qwr);
    if ($tf) {
      return true;
    }else {
      return false;
    }
  }

  public function hapus($kodeBarang)
  {
    $DB = new Database;
    $DB->basisdata = basisData();
    // Tabel kode_barang
    $qwr = "DELETE FROM kode_barang WHERE kode_barang = '$kodeBarang' ";
    $tf1 = $DB->eksekusi($qwr);
    // Tabel karung
    $qwr = "DELETE FROM karung WHERE kode_barang = '$kodeBarang'";
    $tf2 = $DB->eksekusi($qwr);
    // Tabel harga
    $qwr = "DELETE FROM harga WHERE kode_barang = '$kodeBarang'";
    $tf3 = $DB->eksekusi($qwr);
    if ($tf1 == true AND $tf2 == true AND $tf3 == true) {
      return true;
    }else {
      return false;
    }
  }

  public function barangMasuk($kb, $n, $rp, $id_s)
  {
    $Conn = new Database;
    $Conn->basisdata = basisdata();
    // Tabel harga
    $qwr = "SELECT d.laba_d, kb.nama_kb, kb.satuan_kb FROM departemen d
            INNER JOIN kode_barang kb ON kb.id_d = d.id_d
            WHERE kb.kode_barang = '$kb' ";
    $aaa = $Conn->baca($qwr);
    $persenLaba = formatQuery($aaa[0][0]);
    $namaKB     = formatQuery($aaa[0][1]);
    $satuanKB   = formatQuery($aaa[0][2]);

    $qwr   = "SELECT nama_s FROM supplier WHERE id_s = $id_s ";
    $aaa   = $Conn->baca($qwr);
    $namaS = formatQuery($aaa[0][0]);

    $qwr = "SELECT rppokok_h FROM harga WHERE kode_barang = '$kb' ";
    $aaa = $Conn->baca($qwr);
    $rpPokokAwal = $aaa[0][0];

    $qwr = "SELECT jumlah_ka FROM karung WHERE kode_barang = '$kb' ";
    $aaa = $Conn->baca($qwr);
    $nAwal = $aaa[0][0];

    $sigmaAwal     = $rpPokokAwal * $nAwal;
    $sigmaSekarang = $n * $rp;

    $rpPokok       = ($sigmaAwal + $sigmaSekarang)/($nAwal + $n);
    $rpHarga       = $rpPokok * ($persenLaba/100) + $rpPokok;

    $qwr = "UPDATE harga
            SET rppokok_h = $rpPokok,
                rpjual_h = $rpHarga
            WHERE kode_barang = BINARY '$kb' ";
    $tf1 = $Conn->eksekusi($qwr);

    // Tabel barang_masuk
    $tanggal = tanggal();
    $petugas = nama();
    $rptotal = $n * $rp;
    $qwr = "INSERT INTO barang_masuk
            (kode_barang, nama_kb, satuan_kb, petugas_bm, id_s, nama_s, tanggal_bm, jumlah_bm, rpsatuan_bm, rptotal_bm)
            VALUES
            ('$kb', '$namaKB', '$satuanKB', '$petugas', $id_s, '$namaS', '$tanggal', $n, $rp, $rptotal)";
    $tf2 = $Conn->eksekusi($qwr);
    // Tabel karung
    $qwr = "UPDATE karung
            SET jumlah_ka = jumlah_ka+$n
            WHERE kode_barang = '$kb' ";
    $tf3 = $Conn->eksekusi($qwr);

    if ($tf1 == true AND $tf2 == true AND $tf3 == true) {
      return true;
    }else {
      return false;
    }
  }

  public function barangKeluar($noNota, $yth, $kodeBarang, $jumlahBarang, $hargaBaris, $totalBaris, $pembayaran)
  {
    $Conn = new Database;
    $Conn->basisdata = basisData();

    $tanggal = tanggal();
    $petugas = nama();

    // Tabel nota
    $qwr = "INSERT INTO nota (no_n, tanggal_n, klien_n, petugas_n, rpjumlah_n, rpppn_n, rptotal_n)
            VALUES('$noNota', '$tanggal', '$yth', '$petugas', null, null, $pembayaran)";
    $tf1 = $Conn->eksekusi($qwr);

    // Tabel barang_keluar & karung
    $qwr = "SELECT MAX(id_n) FROM nota";
    $z   = $Conn->baca($qwr);
    $id_n = $z[0][0];
    $tf2 = true;
    $tf3 = true;

    for ($i=0; $i < count($kodeBarang); $i++) {
      // ambil data tabel kode_barang
      $qwr = "SELECT nama_kb, satuan_kb FROM kode_barang WHERE kode_barang = '$kodeBarang[$i]' ";
      $aaa = $Conn->baca($qwr);
      $namaKB   = formatQuery($aaa[0][0]);
      $satuanKB = formatQuery($aaa[0][1]);

      // Tabel barang keluar
      $qwr  = "INSERT INTO barang_keluar
               (id_n, kode_barang, nama_kb, jumlah_bk, satuan_kb, rphargasatuan_bk, rptotal_bk)
               VALUES
               ($id_n, '$kodeBarang[$i]', '$namaKB', $jumlahBarang[$i], '$satuanKB', $hargaBaris[$i], $totalBaris[$i])";
      $xyz = $Conn->eksekusi($qwr);
      if (!$xyz) {
        $tf2 = false;
      }

      // Tabel karung
      $qwr = "UPDATE karung
              SET jumlah_ka = jumlah_ka - $jumlahBarang[$i]
              WHERE kode_barang = '$kodeBarang[$i]' ";
      $xyz = $Conn->eksekusi($qwr);
      if (!$xyz) {
        $tf3 = false;
      }
    }

    if ($tf1 == true AND $tf2 == true AND $tf3 == true) {
      return true;
    }else {
      return false;
    }
  }
}


?>
