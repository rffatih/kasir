<?php

function password()
{
  $id   = $_SESSION["id"];
  $DB   = new Database;
  $qwr  = "SELECT password FROM pengguna WHERE id_pengguna = '$id'";
  $data = $DB->baca($qwr);
  return $data[0][0];
}

?>
