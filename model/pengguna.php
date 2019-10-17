<?php

/**
 *
 */
class Pengguna
{

  // function __construct()
  // {
  // }
  public function login ()
  {
    $arrnotif = null;

    $id   = formatQuery(@$_REQUEST["id"]);
    $pass = formatQuery(@$_REQUEST["password"]);

    $query = "SELECT * FROM pengguna WHERE
              id_pengguna = BINARY '$id' AND
              password    = BINARY '$pass' AND
              level      != 0 ";
    $DB  = new Database;
    $hsl = $DB->baca($query);
    if ($hsl != null) {
			$_SESSION["id"]    = $hsl[0][0];
    } else {
      $arrnotif[] = "lg1";
    }
    return $arrnotif;
  }

  public function logout()
  {
    if (isset($_SESSION['id'])) {
			session_unset();
			session_destroy();
		}
  }

  public function daftar()
  {
    $arrnotif = null;
    $nm = formatQuery(@$_REQUEST["nama"]);
    $id = formatQuery(@$_REQUEST["id"]);
    $p1 = formatQuery(@$_REQUEST["pass1"]);
    $p2 = formatQuery(@$_REQUEST["pass2"]);

    if ($p1 === $p2) {
      $query = "INSERT INTO pengguna
                (id_pengguna, password, nama, level, basisdata)
                VALUES ('$id', '$p1', '$nm', 0, '') ";
      $DB = new Database;
      $prm = $DB->eksekusi($query);
      if (!$prm) {
        $arrnotif[] = "df1";
      } else {
        $arrnotif []= "df0";
      }
    } else {
      $arrnotif[] = "df2";
    }
    return $arrnotif;
  }
}


?>
