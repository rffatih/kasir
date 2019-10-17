<?php

class APemasok
{
  public function index()
  {
    $data = $this->model();
    $this->view($data);
  }

  private function model()
  {
    $MPemasok = new MPemasok;
    $data = $MPemasok->baca();
    return $data;
  }

  private function view($data)
  {
    $View = new View;
    $View->pemasok($data);
  }

}


?>
