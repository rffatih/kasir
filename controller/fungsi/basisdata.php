<?php

function basisData()
{
  global $G_DB_prefix;
  $id   = $_SESSION["id"];
  $DB   = new Database;
  $qwr  = "SELECT basisdata FROM pengguna WHERE id_pengguna = '$id'";
  $data = $DB->baca($qwr);
  return $G_DB_prefix.$data[0][0];
}

?>
