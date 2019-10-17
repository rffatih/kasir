<?php

class ProsesPendaftaran
{

  public function index()
  {
    $arrnotif = $this->model();

    $Notif = new Notif;
    $notif = $Notif->encode($arrnotif);

    if ($arrnotif[0] == "df0") {
      $halaman = $_REQUEST["dari"];
      header("location:?halaman=$halaman&$notif");
    } else {
      header("location:?halaman=formpendaftaran&$notif");
    }
  }

  public function model()
  {
    $Pengguna = new Pengguna;
    $arrnotif = $Pengguna->daftar();
    return $arrnotif;
  }

}


?>
