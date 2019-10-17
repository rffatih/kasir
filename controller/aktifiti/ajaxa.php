<?php

class Ajaxa
{
  public function index()
  {
    $this->model();
  }

  private function model()
  {
    $Ajax = new Ajax;
    $Ajax->index();
  }
}


?>
