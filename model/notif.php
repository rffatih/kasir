<?php

class Notif
{

  public function index($verify)
  {
    $arr = $this->bacaKode();
    if ($arr) {
      $tf = $this->verify($verify, $arr);
      if ($tf) {
        $this->cetak($verify);
      }
    }
  }

  private function bacaKode()
  {
    $error = @$_REQUEST["notif"];
    if ($error) {
      $arr = json_decode($error);
      return $arr;
    } else {
      return false;
    }
  }

  private function verify($verify, $arr)
  {
    $return = false;
    foreach ($arr as $x) {
      if ($x == $verify) {
        $return = true;
      }
    }
    return $return;
  }

  private function cetak($verify)
  {
    $proteksi = "proteksi";
    include "controller/dll/kodeerror.php";
    echo $bunyiError;
  }

  public function encode($arrnotif)
  {
    $arrnotif = json_encode($arrnotif);
    return "notif=$arrnotif";
  }
}


?>
