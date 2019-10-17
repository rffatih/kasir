<?php

class Profil
{

  public function index()
  {
    $this->view();
  }

  private function model()
  {

  }

  private function view()
  {
    $View = new View;
    $View->profil();
  }

}

?>
