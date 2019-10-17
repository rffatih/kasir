<?php

class AHarga
{
  public function index()
  {
    $data = $this->model();
    $this->view($data);
  }

  private function model()
  {
    $MQuery = new MQuery;
    $data   = $MQuery->harga();
    return $data;
  }

  private function view($data)
  {
    $View = new View;
    $View->harga($data);
  }
}


?>
