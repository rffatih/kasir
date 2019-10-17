<?php

class ASuntingKodeBarang
{
  public function index()
  {
    $data = $this->model();
    $this->view($data);
  }

  private function model()
  {
    $kodeBarang = formatQuery($_REQUEST["kodebarang"]);
    $MBarang = new MBarang;
    $data["kb"] = $MBarang->bacaBaris($kodeBarang);
    $MDepartemen = new Departemen;
    $data["dep"] = $MDepartemen->baca();
    return $data;
  }

  private function view($data)
  {
    $View = new View;
    $View->suntingKodeBarang($data);
  }

}


?>
