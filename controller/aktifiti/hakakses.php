<?php

class HakAkses
{
  public function index()
  {
    $data = $this->model();
    $this->view($data);
  }

  private function model()
  {
    $Akses = new Akses;
    $data = $Akses->lihat();
    return $data;
  }

  private function view($data)
  {
    $View = new View;
    $View->hakAkses($data);
  }
}


?>
