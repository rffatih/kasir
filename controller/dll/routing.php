<?php

if (isset($this->proteksi))
{
  switch ($this->halaman) {
    case "login":
      $Aktifiti = new Login;
      $Aktifiti->index();
      break;
    case "formpendaftaran":
      $Aktifiti = new FormPendaftaran;
      $Aktifiti->index();
      break;
    case "prosespendaftaran":
      $Aktifiti = new ProsesPendaftaran;
      $Aktifiti->index();
      break;
    case "logout":
      $Aktifiti = new Logout;
      $Aktifiti->index();
      break;
    case "profil":
      $Aktifiti = new Profil;
      $Aktifiti->index();
      break;
    case "formpendaftaran":
      $Aktifiti = new FormPendaftaran;
      $Aktifiti->index();
      break;
    case "prosespendaftaran":
      $Aktifiti = new ProsesPendaftaran;
      $Aktifiti->index();
      break;
    case 'hakakses':
      $Aktifiti = new HakAkses;
      $Aktifiti->index();
      break;
    case 'basisdata':
      $Aktifiti = new Basisdata;
      $Aktifiti->index();
      break;
    case 'departemen':
      if (validasiBasisData()) {
        $Aktifiti = new ADepartemen;
        $Aktifiti->index();
      }
      break;
    case 'suntingdepartemen':
      if (validasiBasisData()) {
        $Aktifiti = new ASuntingDepartemen;
        $Aktifiti->index();
      }
      break;
    case 'pemasok':
      if (validasiBasisData()) {
        $Aktifiti = new APemasok;
        $Aktifiti->index();
      }
      break;
    case 'suntingpemasok':
      if (validasiBasisData()) {
        $Aktifiti = new ASuntingPemasok;
        $Aktifiti->index();
      }
      break;
    case 'kodebarang':
      if (validasiBasisData()) {
        $Aktifiti = new AKodeBarang;
        $Aktifiti->index();
      }
      break;
    case 'suntingkodebarang':
      if (validasiBasisData()) {
        $Aktifiti = new ASuntingKodeBarang;
        $Aktifiti->index();
      }
      break;
    case 'pembelian':
      if (validasiBasisData()) {
        $Aktifiti = new APembelian;
        $Aktifiti->index();
      }
      break;
    case 'persediaan':
      if (validasiBasisData()) {
        $Aktifiti = new APersediaan;
        $Aktifiti->index();
      }
      break;
    case 'hargajual':
      if (validasiBasisData()) {
        $Aktifiti = new AHarga;
        $Aktifiti->index();
      }
      break;
    case 'suntingharga':
      if (validasiBasisData()) {
        $Aktifiti = new ASuntingHarga;
        $Aktifiti->index();
      }
      break;
    case 'fifo':
      if (validasiBasisData()) {
        $Aktifiti = new AFifo;
        $Aktifiti->index();
      }
      break;
    case 'bukunota':
      if (validasiBasisData()) {
        $Aktifiti = new ABukuNota;
        $Aktifiti->index();
      }
      break;
    case 'penjualan':
      if (validasiBasisData()) {
        $Aktifiti = new APenjualan;
        $Aktifiti->index();
      }
      break;
    case 'ajax':
      $Aktifiti = new Ajaxa;
      $Aktifiti->index();
      break;
    default:
      if ($this->user == "nosesi") {
        $Aktifiti = new FormLogin;
        $Aktifiti->index();
      } else {
        $Aktifiti = new Beranda;
        $Aktifiti->index();
      }
      break;
  }
}

?>
