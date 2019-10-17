<?php

class Beranda
{

  public function index()
  {
    $this->view();
  }

  private function view()
  {
    $View = new View;
    $View->beranda();
  }

}

?>
