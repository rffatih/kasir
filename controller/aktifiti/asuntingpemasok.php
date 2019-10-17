<?php

class ASuntingPemasok
{
  public function index()
  {
    $data = $this->model();
    $this->view($data);
  }

  private function model()
  {
    $id_p = formatQuery(@$_REQUEST["id"]);

    $MPemasok = new MPemasok;
    $data = $MPemasok->bacaBaris($id_p);
    return $data;
  }

  private function view($data)
  {
    $View = new View;
    $View->suntingPemasok($data);
  }
}


?>
