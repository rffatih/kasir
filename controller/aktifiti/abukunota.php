<?php

class ABukuNota
{
  public function index()
  {
    // pra proses
    $nomor = @$_REQUEST["nomor"];

    // proses
    if ($nomor) {
      $data = $this->modelNomor($nomor);

      $data["a"] = @$_REQUEST["a"];
      $this->viewNomor($data);

    }else {
      if (@$_REQUEST["a"]) {
        $a = @$_REQUEST["a"];
      } else {
        $a = 1;
      }
      $n = 25;

      $data = $this->model(($a-1), $n);

      // persiapan data
      $buff["qwr"] = $data["sbh"];
      $buff["a"]   = $a;
      $buff["n"]   = $n;
      $buff["h"]   = "?halaman=bukunota";
      $data["sbh"] = $buff;

      $this->view($data);
    }
  }

  private function model($a, $n)
  {
    $MQuery = new MQuery;
    $data   = $MQuery->bukuNota($a, $n);
    return $data;
  }

  private function view($data)
  {
    $View = new View;
    $View->bukuNota($data);
  }

  private function viewNomor($data)
  {
    $View = new View;
    $View->perNota($data);
  }

  private function modelNomor($nomor)
  {
    $MQuery = new MQuery;
    $data = $MQuery->perNota($nomor);
    return $data;
  }
}


?>
