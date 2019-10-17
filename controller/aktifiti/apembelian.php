<?php

class APembelian
{
  public function index()
  {
    $data = $this->model();
    $this->view($data);
  }

  private function model()
  {
    $MPemasok = new MPemasok;
    $data["pemasok"] = $MPemasok->baca();

    $MBarang = new MBarang;
    $data["kodebarang"] = $MBarang->baca();

    return $data;
  }

  private function view($data)
  {
    $View = new View;
    $View->pembelian($data);
  }
}


?>
