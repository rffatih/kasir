<?php

class AFifo
{
  public function index()
  {
    // pra proses
    if (@$_REQUEST["a"]) {
      $a = @$_REQUEST["a"];
    } else {
      $a = 1;
    }
    $n = 25;

    // proses
    $data = $this->model(($a-1), $n);

    // persiapan data
    $buff["qwr"] = $data["sbh"];
    $buff["a"]   = $a;
    $buff["n"]   = $n;
    $buff["h"]   = "?halaman=fifo";
    $data["sbh"] = $buff;

    // tampilkan
    $this->view($data);
  }

  private function model($a, $n)
  {
    $MQuery = new MQuery;
    $data   = $MQuery->fifo($a, $n);
    return $data;
  }

  private function view($data)
  {
    $View = new View;
    $View->fifo($data);
  }
}


?>
