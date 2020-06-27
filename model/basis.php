<?php

class Basis
{
  private $prefix;
  private $prefix_n;

  function __construct()
  {
    global $G_DB_prefix;
    $this->prefix = $G_DB_prefix;
    $this->prefix_n = strlen($this->prefix);
  }

  public function baca()
  {
    $qwr  = "SHOW DATABASES";
    $DB   = new Database;
    $data = $DB->baca($qwr);
    $db   = null;
    $i = 0;
    foreach ($data as $row) {
      $x = substr($row[0], 0, $this->prefix_n);
      if ($x == $this->prefix) {
        $y = substr($row[0], $this->prefix_n);
        $db[$i][] = $y;
        $i++;
      }
    }
    return $db;
  }

  public function buat($db)
  {
    $db  = $this->prefix.$db;
    $qwr = "CREATE DATABASE IF NOT EXISTS $db ";
    $DB  = new Database;
    $tf1  = $DB->eksekusi($qwr);
    if ($tf1) {
      $tf2 = $this->cetakBiru($db);
      if ($tf2) {
        return true;
      }else {
        return false;
      }
    }else {
      return false;
    }
  }

  public function hapus($db)
  {
    $db_  = $this->prefix.$db;
    $qwr = "DROP DATABASE $db_ ";
    $DB  = new Database;
    $tf1 = $DB->eksekusi($qwr);
    if ($tf1) {
      $qwr = "UPDATE pengguna
              SET basisdata = ''
              WHERE basisdata = '$db' ";
      $tf2 = $DB->eksekusi($qwr);
      if ($tf2) {
        return true;
      }else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function reset()
  {
    $qwr = "
      DROP TABLE IF EXISTS karung;
      DROP TABLE IF EXISTS barang_keluar;
      DROP TABLE IF EXISTS barang_masuk;
      DROP TABLE IF EXISTS nota;
      DROP TABLE IF EXISTS harga;
      DROP TABLE IF EXISTS kode_barang;
      DROP TABLE IF EXISTS supplier;
      DROP TABLE IF EXISTS departemen;
      
      CREATE TABLE departemen
      ( id_d INT NOT NULL AUTO_INCREMENT,
        nama_d VARCHAR(25) UNIQUE NOT NULL,
        laba_d INT,
        PRIMARY KEY (id_d)
      );
      
      CREATE TABLE supplier
      ( id_s INT NOT NULL AUTO_INCREMENT,
        nama_s VARCHAR(25) UNIQUE NOT NULL,
        PRIMARY KEY (id_s)
      );
      
      CREATE TABLE kode_barang
      ( kode_barang VARCHAR(25),
        nama_kb VARCHAR(50),
        satuan_kb VARCHAR(25),
        id_d INT,
        PRIMARY KEY (kode_barang),
        FOREIGN KEY (id_d) REFERENCES departemen(id_d) ON UPDATE CASCADE ON DELETE CASCADE
      );
      
      CREATE TABLE harga
      ( kode_barang VARCHAR(50) NOT NULL UNIQUE,
        rppokok_h DECIMAL(18,2),
        rpjual_h DECIMAL(18,2),
        FOREIGN KEY (kode_barang) REFERENCES kode_barang(kode_barang) ON UPDATE CASCADE ON DELETE CASCADE
      );
      
      CREATE TABLE nota
      ( id_n INT AUTO_INCREMENT NOT NULL,
        no_n VARCHAR(25),
        tanggal_n DATETIME,
        klien_n VARCHAR(25),
        petugas_n VARCHAR(25),
        rpjumlah_n DECIMAL(18,2),
        rpppn_n DECIMAL(18,2),
        rptotal_n DECIMAL(18,2),
        time_stamp timestamp,
        PRIMARY KEY (id_n)
      );
      
      CREATE TABLE barang_masuk
      ( id_bm INT AUTO_INCREMENT,
        kode_barang VARCHAR(25),
        nama_kb VARCHAR(25),
        satuan_kb VARCHAR(25),
        petugas_bm VARCHAR(25),
        id_s INT,
        nama_s VARCHAR(25),
        tanggal_bm DATETIME,
        jumlah_bm INT,
        rpsatuan_bm DECIMAL(18,2),
        rptotal_bm DECIMAL(18,2),
        time_stamp timestamp,
        PRIMARY KEY (id_bm)
      );
      
      CREATE TABLE barang_keluar
      ( id_bk INT AUTO_INCREMENT,
        id_n INT,
        kode_barang VARCHAR(25),
        nama_kb VARCHAR(25),
        jumlah_bk INT,
        satuan_kb VARCHAR(25),
        rphargasatuan_bk DECIMAL(18,2),
        rptotal_bk DECIMAL(18,2),
        time_stamp timestamp,
        PRIMARY KEY (id_bk),
        FOREIGN KEY (id_n) REFERENCES nota(id_n) ON UPDATE CASCADE ON DELETE CASCADE
      );
      
      CREATE TABLE karung (
        kode_barang VARCHAR(25) NOT NULL UNIQUE,
        jumlah_ka INT,
        FOREIGN KEY (kode_barang) REFERENCES kode_barang(kode_barang) ON DELETE CASCADE ON UPDATE CASCADE
      );
    ";
    $DB = new Database;
    $tf = $DB->multiEksekusi($qwr);
    if ($tf) return true;
    else return false;
  }

  private function cetakBiru($bd)
  {
		$cetakBiru[] = "
    CREATE TABLE departemen(
      id_d   INT NOT NULL AUTO_INCREMENT,
      nama_d VARCHAR(25) UNIQUE,
      laba_d INT,
      PRIMARY KEY (id_d)
    )";

		$cetakBiru[] = "
    CREATE TABLE supplier(
      id_s   INT NOT NULL AUTO_INCREMENT,
      nama_s VARCHAR(25) UNIQUE,
      PRIMARY KEY (id_s)
    )";

		$cetakBiru[] = "
    CREATE TABLE kode_barang(
      kode_barang VARCHAR(25),
      nama_kb     VARCHAR(50),
      satuan_kb   VARCHAR(25),
      id_d        INT,
      PRIMARY KEY (kode_barang),
      FOREIGN KEY (id_d) REFERENCES departemen(id_d) ON UPDATE CASCADE ON DELETE CASCADE
    )";

		$cetakBiru[] = "
    CREATE TABLE harga(
      kode_barang VARCHAR(50) NOT NULL UNIQUE,
      rppokok_h   DECIMAL(18,2),
      rpjual_h    DECIMAL(18,2),
      FOREIGN KEY (kode_barang) REFERENCES kode_barang(kode_barang) ON UPDATE CASCADE ON DELETE CASCADE
    )";

		$cetakBiru[] = "
    CREATE TABLE nota(
      id_n        INT AUTO_INCREMENT NOT NULL,
      no_n        VARCHAR(25),
      tanggal_n   DATETIME,
      klien_n     VARCHAR(25),
      petugas_n   VARCHAR(25),
      rpjumlah_n  DECIMAL(18,2),
      rpppn_n     DECIMAL(18,2),
      rptotal_n   DECIMAL(18,2),
      time_stamp timestamp,
      PRIMARY KEY (id_n)
    )";

		$cetakBiru[] = "
    CREATE TABLE barang_masuk(
      id_bm       INT AUTO_INCREMENT,
      kode_barang VARCHAR(25),
      nama_kb     VARCHAR(25),
      satuan_kb   VARCHAR(25),
      petugas_bm  VARCHAR(25),
      id_s        INT,
      nama_s      VARCHAR(25),
      tanggal_bm  DATETIME,
      jumlah_bm   INT,
      rpsatuan_bm DECIMAL(18,2),
      rptotal_bm  DECIMAL(18,2),
      time_stamp  timestamp,
      PRIMARY KEY (id_bm)
    )";

		$cetakBiru[] = "
    CREATE TABLE barang_keluar(
      id_bk INT        AUTO_INCREMENT,
      id_n             INT,
      kode_barang      VARCHAR(25),
      nama_kb          VARCHAR(25),
      jumlah_bk        INT,
      satuan_kb        VARCHAR(25),
      rphargasatuan_bk DECIMAL(18,2),
      rptotal_bk       DECIMAL(18,2),
      time_stamp       timestamp,
      PRIMARY KEY (id_bk),
      FOREIGN KEY (id_n) REFERENCES nota(id_n) ON UPDATE CASCADE ON DELETE CASCADE
    )";

    $cetakBiru[] = "
    CREATE TABLE karung(
      kode_barang VARCHAR(25) NOT NULL UNIQUE,
      jumlah_ka INT,
      FOREIGN KEY (kode_barang) REFERENCES kode_barang(kode_barang) ON DELETE CASCADE ON UPDATE CASCADE
    )";

    $DB = new Database;
    $DB->basisdata = $bd;
    foreach ($cetakBiru as $row ) {
      $tf = $DB->eksekusi($row);
      if ($tf == false) {
        return false;
      }
    }
    return true;
  }

}


?>
