<?php
class View
{
  private $dircss = "view/css/";
  private $dirjsb = "view/script/js/";
  private $dirjss = "view/script/sistem/";
  private $dirakt = "view/html/aktifiti/";
  private $dirpra = "view/html/aktifitipra/";

  private $navigasi   = "view/html/bagian/navigasi.php";
  private $naviset    = "view/html/bagian/naviset.php";

  private function html($head, $body, $data)
  {
    include "html/html.php";
  }

  public function formPendaftaran()
  {
    $head["css"][] = $this->dircss."langgam.css";
    $body["akt"]   = $this->dirakt."formpendaftaran.php";

    $this->html($head, $body, null);
  }

  public function formLogin()
  {
    $head["css"][] = $this->dircss."langgam_login.css";
    $body["akt"]   = $this->dirakt."login.php";

    $this->html($head, $body, null);
  }

  public function beranda()
  {
    $head["css"][] = $this->dircss."langgam.css";
    $body["akt"]   = $this->dirakt."beranda.php";

    $this->html($head, $body, null);
  }

  public function profil()
  {
    $head["css"][] = $this->dircss."langgam.css";
    $head["jss"][] = $this->dirjss."profil.js";
    $body["nav"]   = $this->naviset;
    $body["akt"]   = $this->dirakt."profil.php";

    $this->html($head, $body, null);
  }

  public function hakAkses($data)
  {
    $proteksi = "proteksi";
    include $this->dirpra."hakakses.php";

    $head["css"][] = $this->dircss."langgam.css";
    $head["jss"][] = $this->dirjss."hakses.js";
    $body["nav"]   = $this->naviset;
    $body["akt"]   = $this->dirakt."hakakses.php";

    $this->html($head, $body, $data);
  }

  public function basisdata($data)
  {
    $proteksi = "proteksi";
    include $this->dirpra."basisdata.php";

    $head["css"][] = $this->dircss."langgam.css";
    $head["jss"][] = $this->dirjss."basisdata.js";
    $body["nav"]   = $this->naviset;
    $body["akt"]   = $this->dirakt."basisdata.php";

    $this->html($head, $body, $data);
  }

  public function departemen($data)
  {
    $proteksi = "proteksi";
    include $this->dirpra."departemen.php";

    $head["css"][] = $this->dircss."langgam.css";
    $head["jss"][] = $this->dirjss."departemen.js";
    $body["nav"]   = $this->navigasi;
    $body["akt"]   = $this->dirakt."departemen.php";

    $this->html($head, $body, $data);
  }

  public function suntingDepartemen($data)
  {
    $head["css"][] = $this->dircss."langgam.css";
    $head["jss"][] = $this->dirjss."suntingdepartemen.js";
    $body["akt"]   = $this->dirakt."suntingdepartemen.php";

    $this->html($head, $body, $data);
  }

  public function pemasok($data)
  {
    $proteksi = "proteksi";
    include $this->dirpra."/pemasok.php";

    $head["css"][] = $this->dircss."langgam.css";
    $head["jss"][] = $this->dirjss."pemasok.js";
    $body["nav"]   = $this->navigasi;
    $body["akt"]   = $this->dirakt."pemasok.php";

    $this->html($head, $body, $data);
  }

  public function suntingPemasok($data)
  {
    $head["css"][] = $this->dircss."langgam.css";
    $head["jss"][] = $this->dirjss."suntingpemasok.js";
    $body["akt"]   = $this->dirakt."suntingpemasok.php";

    $this->html($head, $body, $data);
  }

  public function kodeBarang($data)
  {
    $proteksi = "proteksi";
    include $this->dirpra."kodebarang.php";

    $head["css"][] = $this->dircss."langgam.css";
    $head["jss"][] = $this->dirjss."kodebarang.js";
    $body["nav"]   = $this->navigasi;
    $body["akt"]   = $this->dirakt."kodebarang.php";

    $this->html($head, $body, $data);
  }

  public function suntingKodeBarang($data)
  {
    $head["css"][] = $this->dircss."langgam.css";
    $head["jss"][] = $this->dirjss."suntingkodebarang.js";
    $body["akt"]   = $this->dirakt."suntingkodebarang.php";

    $this->html($head, $body, $data);
  }

  public function pembelian($data)
  {
    $proteksi = "proteksi";
    include $this->dirpra."pembelian.php";

    $head["css"][] = $this->dircss."langgam.css";
    $head["jss"][] = $this->dirjss."pembelian.js";
    $body["nav"]   = $this->navigasi;
    $body["akt"]   = $this->dirakt."pembelian.php";

    $this->html($head, $body, $data);
  }

  public function persediaan($data)
  {
    $head["css"][] = $this->dircss."langgam.css";
    $body["nav"]   = $this->navigasi;
    $body["akt"]   = $this->dirakt."persediaan.php";

    $this->html($head, $body, $data);
  }

  public function penjualan($data)
  {
    $proteksi = "proteksi";
    include $this->dirpra."penjualan.php";

    $head["css"][] = $this->dircss."langgam.css";
    $head["jss"][] = $this->dirjss."kertasnota.js";
    $head["jss"][] = $this->dirjss."penjualan.js";
    $body["akt"] = $this->dirakt."penjualan.php";

    $this->html($head, $body, $data);
  }

  public function harga($data)
  {
    $head["css"][] = $this->dircss."langgam.css";
    $body["nav"]   = $this->navigasi;
    $body["akt"]   = $this->dirakt."harga.php";

    $this->html($head, $body, $data);
  }

  public function fifo($data)
  {
    $proteksi = "proteksi";
    include $this->dirpra."fifo.php";

    $head["css"][] = $this->dircss."langgam.css";
    $body["nav"]   = $this->navigasi;
    $body["akt"]   = $this->dirakt."fifo.php";

    $this->html($head, $body, $data);
  }

  public function bukuNota($data)
  {
    $proteksi = "proteksi";
    include $this->dirpra."bukunota.php";

    $head["css"][] = $this->dircss."langgam.css";
    $body["nav"]   = $this->navigasi;
    $body["akt"]   = $this->dirakt."bukunota.php";

    $this->html($head, $body, $data);
  }

  public function bukuRekab($data)
  {
    $proteksi = "proteksi";
    include $this->dirpra."bukurekab.php";

    $head["css"][] = $this->dircss."langgam.css";
    $body["nav"]   = $this->navigasi;
    $body["akt"]   = $this->dirakt."bukurekab.php";

    $this->html($head, $body, $data);
  }

  public function perNota($data)
  {
    $head["css"][] = $this->dircss."langgam.css";
    $body["nav"]   = $this->navigasi;
    $body["akt"]   = $this->dirakt."pernota.php";

    $this->html($head, $body, $data);
  }

  public function tidakAdaDb()
  {
    $head["css"][] = $this->dircss."langgam.css";
    $body["akt"]   = $this->dirakt."tidak_ada_db.php";

    $this->html($head, $body, null);
  }

  public function tidakAdaAkses()
  {
    $head["css"][] = $this->dircss."langgam.css";
    $body["akt"]   = $this->dirakt."tidak_ada_akses.php";

    $this->html($head, $body, null);
  }

}
?>
