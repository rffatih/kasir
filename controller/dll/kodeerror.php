<?php

if (@$proteksi) {
  switch ($verify) {
    case 'lg1':
      $bunyiError = "Username yang anda masukkan salah atau password tidak cocok";
      break;
    case 'df0':
      $bunyiError = "Pendaftaran berhasil, silahkan menghubungi administrasi untuk verifikasi";
      break;
    case 'df1':
      $bunyiError = "Username ini tidak bisa digunakan, silahakn memilih variasi Username baru";
      break;
    case 'df2':
      $bunyiError = "Verifikasi password tidak cocok";
      break;

    default:
      break;
  }
}

?>
