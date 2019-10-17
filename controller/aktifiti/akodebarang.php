<?php

class AKodeBarang
{
  public function index()
  {
    $kodeBarang = @$_REQUEST["kodebarang"];
    if ($kodeBarang) {
      // pra proses
      if (@$_REQUEST["a"]) {
        $a = @$_REQUEST["a"];
      } else {
        $a = 1;
      }
      $n = 25;

      // proses
      $data = $this->modelKodeBarang($kodeBarang, ($a-1), $n);

      // persiapan data
      $buff["qwr"] = $data["sbh"];
      $buff["a"]   = $a;
      $buff["n"]   = $n;
      $buff["h"]   = "?halaman=kodebarang&kodebarang=".$_REQUEST["kodebarang"];
      $data["sbh"] = $buff;

      $this->viewKodeBarang($data);

    }else {
      $data = $this->model();
      $this->view($data);
    }
  }

  private function model()
  {
    $MBarang = new MBarang;
    $data[0] = $MBarang->baca();
    $MDepartemen = new Departemen;
    $data[1] = $MDepartemen->baca();
    return $data;
  }

  private function view($data)
  {
    $View = new View;
    $View->kodeBarang($data);
  }

  private function modelKodeBarang($kodeBarang, $a, $n)
  {
    $MQuery = new MQuery;
    $data = $MQuery->bukuRekab($kodeBarang, $a, $n);
    return $data;
  }

  private function viewKodeBarang($data)
  {
    $View = new View;
    $View->bukuRekab($data);
  }

}


?>
