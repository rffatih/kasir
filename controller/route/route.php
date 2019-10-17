<?php

/**
 *
 */
class Route
{
  private $user;
  private $halaman;
  private $proteksi = "proteksi";

  function __construct()
  {
    $this->halaman= @$_REQUEST["halaman"];
    if (@$_SESSION["id"]) {
      $this->user  = @$_SESSION["id"];
    } else {
      $this->user = "nosesi";
    }
  }

  public function routing()
  {
    $Akses = new Akses;
    $tf = $Akses->baca($this->user, $this->halaman);
    if ($tf) {
      include "controller/dll/routing.php";
    } else {
      $tf2 = $Akses->takAktif($this->user);
      if ($tf2) {
        $Pengguna = new Pengguna;
        $Pengguna->logout();
        header("location:?");
      } else {
        $View = new View;
        $View->tidakAdaAkses();
      }
    }
  }

}


?>
