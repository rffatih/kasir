<?php

class ADepartemen
{

  public function index()
  {
    $data = $this->model();
    $this->view($data);
  }

  private function model()
  {
    $Departemen = new Departemen;
    $data = $Departemen->baca();
    return $data;
  }

  private function view($data)
  {
    $View = new View;
    $View->departemen($data);
  }
}


?>
