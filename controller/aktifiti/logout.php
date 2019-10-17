<?php

class Logout
{

  public function index()
  {
    $this->model();
  }

  private function model()
  {
    $Pengguna = new Pengguna;
    $Pengguna->logout();
    header("location:?");
  }

}

?>
