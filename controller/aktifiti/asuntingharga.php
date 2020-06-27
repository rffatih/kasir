<?php


class ASuntingHarga
{
  public function index()
  {
    $data = $this->model();
    $this->view($data);
  }

  private function view($data)
  {
    $View = new View;
    $View->suntingHarga($data);
  }

  private function model()
  {
    $kodeBarang = formatQuery($_REQUEST["kodebarang"]);
    $MHarga = new MHarga;
    $data = $MHarga->bacaPerKodeBarang($kodeBarang);
    return $data;
  }
}


?>
