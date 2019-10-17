<?php

function validasiBasisData(){
  global $G_DB_prefix;
  if (basisData() == $G_DB_prefix) {
    $View = new View;
    $View->tidakAdaDb();
  }else {
    return true;
  }
}

?>
