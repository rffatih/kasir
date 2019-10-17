<?php

function tanggal()
{
  date_default_timezone_set("Asia/Jakarta");
  $tgl = date("Y-m-d H:i:s");
  return $tgl;
}

?>
