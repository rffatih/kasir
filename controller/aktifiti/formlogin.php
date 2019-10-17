<?php

class FormLogin
{

  public function index()
  {
    $this->view();
  }

  private function view()
  {
    $View = new View;
    $View->formLogin();
  }

}


?>
