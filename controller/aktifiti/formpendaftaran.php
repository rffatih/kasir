<?php

class FormPendaftaran
{

  public function index()
  {
    $this->view();
  }

  private function view()
  {
    $View = new View;
    $View->formPendaftaran();
  }
  
}


?>
