<?php

function nama()
{
  $id   = $_SESSION["id"];
  $DB   = new Database;
  $qwr  = "SELECT nama FROM pengguna WHERE id_pengguna = '$id'";
  $data = $DB->baca($qwr);
  return $data[0][0];
}

?>
