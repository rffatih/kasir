<?php

/**
 *
 */
class Login
{

  public function index()
  {
    $this->model();
  }

  private function model()
  {
    $Pengguna = new Pengguna;
    $arrnotif = $Pengguna->login();

    $Notif = new Notif;
    $notif = $Notif->encode($arrnotif);
    header("location:?$notif");
  }

}


?>
