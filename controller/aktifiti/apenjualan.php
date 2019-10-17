<?php


class APenjualan
{
  public function index()
  {
    $data = $this->model();
    $this->view($data);
  }

  private function view($data)
  {
    $View = new View;
    $View->penjualan($data);
  }

  private function model()
  {
    $MQuery = new MQuery;
    $data = $MQuery->penjualan();
    return $data;
  }
}


?>
