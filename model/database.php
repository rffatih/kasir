<?php

class Database
{
  public  $basisdata;
  private $server;
  private $user;
  private $pass;

  function __construct()
  {
    global $G_DB_utama;
    global $G_DB_server;
    global $G_DB_user;
    global $G_DB_pass;

    $this->basisdata = $G_DB_utama;
    $this->server    = $G_DB_server;
    $this->user      = $G_DB_user;
    $this->pass      = $G_DB_pass;
  }

  private function konek()
  {
    $konn = mysqli_connect($this->server, $this->user, $this->pass, $this->basisdata);
    if ($konn) {
      return $konn;
    } else {
      return false;
    }
  }

  public function eksekusi($query)
  {
    $konek = $this->konek();
    if ($konek) {
      $buff = mysqli_query($konek, $query);
      return $buff;
    } else {
      return false;
    }
  }

  public function baca($query)
  {
    $eksekusi = $this->eksekusi($query);
    if ($eksekusi) {
      if($eksekusi->num_rows != 0){
				while ($baris = mysqli_fetch_array($eksekusi, MYSQLI_NUM)){
					$data[] = $baris;
				}
			} else {
				$data = null;
			}
			return $data;
    } else {
      return false;
    }
  }

}

?>
