<?php

class Akses
{
  public function baca($user, $halaman)
  {
    $qwr = "SELECT *
            FROM
            hakses h INNER JOIN routing r
            ON h.id_routing = r.id_routing
            WHERE
            h.id_pengguna = '$user' AND
            r.halaman_routing = '$halaman' ";

    $DB  = new Database;
    $tf = $DB->baca($qwr);
    return $tf;
  }

  public function level($pengguna, $level)
  {
    $routing = null;
    $guru    = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22);
    $siswa   = array(0, 1, 2, 3, 4, 5, 6, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22);
    switch ($level) {
      case 2:
        $routing = $guru;
        break;
      case 1:
        $routing = $siswa;
        break;
    }
    $this->hapus($pengguna);
    $this->tambah($pengguna, $routing, $level);
  }

  public function tambah($pengguna, $routing, $level)
  {
    $DB = new Database;
    if ($routing) {
      for ($i=0; $i < count($routing); $i++) {
        $qwr = "INSERT INTO hakses (id_pengguna, id_routing)
                VALUES ('$pengguna', $routing[$i])";
        $DB->eksekusi($qwr);
      }
    }
    $qwr = "UPDATE pengguna
            SET level = $level
            WHERE id_pengguna = BINARY '$pengguna' ";
    $DB->eksekusi($qwr);
  }

  public function hapus($pengguna)
  {
    $qwr = "DELETE FROM hakses
            WHERE id_pengguna = BINARY '$pengguna' ";
    $DB = new Database;
    $DB->eksekusi($qwr);
  }

  public function lihat()
  {
    $qwr = "SELECT * FROM pengguna WHERE level <= 2 ";
    $DB = new Database;
    $data = $DB->baca($qwr);
    return $data;
  }

  public function takAktif($pengguna)
  {
    $qwr = "SELECT level FROM pengguna WHERE id_pengguna = BINARY '$pengguna' ";
    $DB = new Database;
    $data = $DB->baca($qwr);

    if ($data[0][0] == "0" OR $data === null ) {
      return true;
    } else{
      return false;
    }
  }

}


?>
