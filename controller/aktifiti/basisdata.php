<?php

class Basisdata
{
  public function index()
  {
    $data = $this->model();
    $this->view($data);
  }

  private function model()
  {
    $Basis = new Basis;
    $data  = $Basis->baca();
    return $data;
  }

  private function view($data)
  {
    $View = new View();
    $View->basisdata($data);
  }
}


?>
