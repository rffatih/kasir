<?php

class ASuntingDepartemen
{
  public function index()
  {
    $data = $this->model();
    $this->view($data);
  }

  private function model()
  {
    $Departemen = new Departemen;
    $data = $Departemen->bacaBaris();
    return $data;
  }

  private function view($data)
  {
    $View = new View;
    $View->suntingDepartemen($data);
  }

}


?>
