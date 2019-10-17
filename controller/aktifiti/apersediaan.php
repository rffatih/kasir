<?php

class APersediaan
{
  public function index()
  {
    $data = $this->model();
    $this->view($data);
  }

  private function model()
  {
    $MQuery = new MQuery;
    $data = $MQuery->persediaan();
    return $data;
  }

  private function view($data)
  {
    $view = new View;
    $view->persediaan($data);
  }
}


?>
