<?php

class Ajax
{
  public function index()
  {
    if (@$_REQUEST["base"]) {
      $base = @$_REQUEST["base"];
      $tf   = $this->ajaxAkses($base);
      if ($tf) {
        $bag = @$_REQUEST["bag"];
        switch ($bag) {
          // HAK AKSES
          case "haksesreset":
            $user = @$_POST["user"];
            $this->haksesReset($user);
            break;
          case 'haksessubmit':
            $user  = @$_POST["user"];
            $level = @$_POST["level"];
            $basis = @$_POST["basis"];
            $this->haksesSubmit($user, $level, $basis);
            break;
          case 'hakseshapus':
            $user  = @$_POST["user"];
            $this->haksesHapus($user);
            break;

          // BASIS DATA
          case 'bdbuat':
            $bd = @$_POST["bd"];
            $this->bdBuat($bd);
            break;
          case 'bdhapus':
            $bd = @$_POST["bd"];
            $this->bdHapus($bd);
            break;

          // PROFIL
          case 'profila':
            $id   = $_POST["user"];
            $nama = $_POST["nama"];
            $pass = $_POST["pass"];
            $this->profilA($id, $nama, $pass);
            break;
          case 'profilb':
            $id    = $_POST["user"];
            $pass1 = $_POST["pass1"];
            $pass2 = $_POST["pass2"];
            $pass  = $_POST["pass"];
            $this->profilB($id, $pass1, $pass2, $pass);
            break;

          // DEPARTEMEN
          case 'dptbuat':
            $nama = $_POST["nama"];
            $laba = $_POST["laba"];
            $this->dptBuat($nama, $laba);
            break;
          case 'dptsunting':
            $id   = $_POST["id-d"];
            $nama = $_POST["nama"];
            $laba = $_POST["laba"];
            $this->dptSunting($id, $nama, $laba);
            break;
          case 'dpthapus':
            $id   = $_POST["id-d"];
            $this->dptHapus($id);
            break;

          // PEMASOK
          case 'pmkbuat':
            $nama = $_POST["nama"];
            $this->pmkBuat($nama);
            break;
          case 'pmksunting':
            $id   = $_POST["id-p"];
            $nama = $_POST["nama"];
            $this->pmkSunting($id, $nama);
            break;
          case 'pmkhapus':
            $id   = $_POST["id"];
            $this->pmkHapus($id);
            break;

          // KODE BARANG
          case 'kbbuat':
            $kodeBarang = $_POST["kodebarang"];
            $nama       = $_POST["nama"];
            $satuan     = $_POST["satuan"];
            $id_d       = $_POST["id-d"];
            $this->kbBuat($kodeBarang, $nama, $satuan, $id_d);
            break;
          case 'kbsunting':
            $kodeBarang = $_POST["kodebarang"];
            $nama       = $_POST["nama"];
            $satuan     = $_POST["satuan"];
            $id_d       = $_POST["id-d"];
            $this->kbSunting($kodeBarang, $nama, $satuan, $id_d);
            break;
          case 'kbhapus':
            $kodeBarang   = $_POST["kodebarang"];
            $this->kbHapus($kodeBarang);
            break;

          // PEMBELIAN
          case 'pembeliancekkb':
            $kodeBarang = $_POST["kb"];
            $this->pembelianCekkb($kodeBarang);
            break;
          case 'barangmasuk':
            $kb   = $_POST["kb"];
            $n    = $_POST["n"];
            $rp   = $_POST["rp"];
            $id_s = $_POST["id-s"];
            $this->barangMasuk($kb, $n, $rp, $id_s);
            break;

          // PENJUALAN
          case 'penjualan':
            $noNota = $_POST["no-nota"];
            $yth    = $_POST["yth"];
            $kodeBarang = $_POST["kode-barang"];
            $jumlahBarang = $_POST["jumlah-barang"];
            $hargaBaris = $_POST["harga"];
            $totalBaris = $_POST["total"];
            $pembayaran = $_POST["pembayaran"];
            $this->penjualan($noNota, $yth, $kodeBarang, $jumlahBarang, $hargaBaris, $totalBaris, $pembayaran);
            break;

          default:
            // code...
            break;
        }
      } else {
        echo "no-access";
      }
    } else {
      echo "no-base";
    }
  }

  private function ajaxAkses($base)
  {
    if (@$_SESSION["id"]) {
      $id = @$_SESSION["id"];
    } else {
      $id = "nosesi";
    }
    $Akses = new Akses;
    $tf = $Akses->baca($id, $base);
    if ($tf) {
      return true;
    } else {
      return false;
    }
  }

  // HAKSES
  private function haksesReset($user)
  {
    $qwr = "SELECT level, basisdata FROM pengguna WHERE id_pengguna = '$user' ";
    $DB = new Database;
    $hasil = $DB->baca($qwr);

    echo json_encode($hasil);
  }
  private function haksesSubmit($user, $level, $basis)
  {
    $Akses = new Akses;
    $Akses->level($user, $level);

    $DB = new Database;
    $qwr = "UPDATE pengguna
            SET basisdata = '$basis'
            WHERE id_pengguna = '$user' ";
    $DB->eksekusi($qwr);

    $qwr = "SELECT level, basisdata FROM pengguna WHERE id_pengguna = '$user' ";
    $hasil = $DB->baca($qwr);

    echo json_encode($hasil);
  }
  private function haksesHapus($user)
  {
    $Akses = new Akses;
    $Akses->hapus($user);

    $qwr   = "DELETE FROM pengguna WHERE id_pengguna = '$user' ";
    $DB    = new Database;
    $hasil = $DB->eksekusi($qwr);
    if ($hasil) {
      $return[0][0] = "hapus sukses";
      echo json_encode($return);
    }
  }

  // BASIS DATA
  private function bdBuat($bd)
  {
    $Basis = new Basis;
    $tf = $Basis->buat($bd);
    if ($tf) {
      $return[0] = "oyi";
      echo json_encode($return);
    }
  }
  private function bdHapus($bd)
  {
    $Basis = new Basis;
    $tf = $Basis->hapus($bd);
    if ($tf) {
      $return[0] = "oyi";
      echo json_encode($return);
    }
  }

  // PROFIL
  private function profilA($id, $nama, $pass)
  {
    if ($pass == password()) {
      $DB  = new Database;
      $qwr = "UPDATE pengguna
              SET nama = '$nama'
              WHERE id_pengguna = '$id'";
      $DB->eksekusi($qwr);
      $return[0][0] = $nama;
      echo json_encode($return);
    }
  }
  private function profilB($id, $pass1, $pass2, $pass)
  {
    if ($pass == password()) {
      if ($pass1 == $pass2) {
        $DB  = new Database;
        $qwr = "UPDATE pengguna
                SET password = '$pass1'
                WHERE id_pengguna = '$id'";
        $DB->eksekusi($qwr);
        $return[0][0] = "sukses";
        echo json_encode($return);
      }else {
        $return[0][0] = "tidaksama";
        echo json_encode($return);
      }
    }
  }

  // DEPARTEMEN
  private function dptBuat($nama, $laba)
  {
    $Departemen = new Departemen;
    $tf = $Departemen->tambah($nama, $laba);
    if ($tf) {
      $data[] = "oyi";
      echo json_encode($data);
    }
  }
  private function dptSunting($id, $nama, $laba)
  {
    $Departemen = new Departemen;
    $tf = $Departemen->edit($id, $nama, $laba);
    if ($tf) {
      $data[] = "oyi";
      echo json_encode($data);
    }
  }
  private function dptHapus($id)
  {
    $Departemen = new Departemen;
    $tf = $Departemen->hapus($id);
    if ($tf) {
      $data[] = "oyi";
      echo json_encode($data);
    }
  }

  // PEMASOK
  private function pmkBuat($nama)
  {
    $MPemasok = new MPemasok;
    $tf = $MPemasok->tambah($nama);
    if ($tf) {
      $data[] = "oyi";
      echo json_encode($data);
    }
  }
  private function pmkSunting($id, $nama)
  {
    $MPemasok = new MPemasok;
    $tf = $MPemasok->edit($id, $nama);
    if ($tf) {
      $data[] = "oyi";
      echo json_encode($data);
    }
  }
  private function pmkHapus($id)
  {
    $MPemasok = new MPemasok;
    $tf = $MPemasok->hapus($id);
    if ($tf) {
      $data[] = "oyi";
      echo json_encode($data);
    }
  }

  // KODE BARANG
  private function kbBuat($kodeBarang, $nama, $satuan, $id_d)
  {
    $MBarang = new MBarang;
    $tf = $MBarang->buatKodeBarang($kodeBarang, $nama, $satuan, $id_d);
    if ($tf) {
      $data[] = "oyi";
      echo json_encode($data);
    }
  }
  private function kbSunting($kodeBarang, $nama, $satuan, $id_d)
  {
    $MBarang = new MBarang;
    $tf = $MBarang->edit($kodeBarang, $nama, $satuan, $id_d);
    if ($tf) {
      $data[] = "oyi";
      echo json_encode($data);
    }
  }
  private function kbHapus($kodeBarang)
  {
    $MBarang = new MBarang;
    $tf = $MBarang->hapus($kodeBarang);
    if ($tf) {
      $data[] = "oyi";
      echo json_encode($data);
    }
  }

  // PEMBELIAN
  private function pembelianCekkb($kodeBarang)
  {
    $MBarang = new MBarang;
    $tf = $MBarang->bacaBaris($kodeBarang);
    if ($tf) {
      $data[] = "oyi";
      echo json_encode($data);
    }
  }

  private function barangMasuk($kb, $n, $rp, $id_s)
  {
    $MBarang = new MBarang;
    $tf = $MBarang->barangMasuk($kb, $n, $rp, $id_s);
    if ($tf) {
      $data[] = "oyi";
      echo json_encode($data);
    }
  }

  public function penjualan($noNota, $yth, $kodeBarang, $jumlahBarang, $hargaBaris, $totalBaris, $pembayaran)
  {
    $MBarang = new MBarang;
    $tf = $MBarang->barangKeluar($noNota, $yth, $kodeBarang, $jumlahBarang, $hargaBaris, $totalBaris, $pembayaran);
    if ($tf) {
      $data[] = "oyi";
      echo json_encode($data);
    }
  }

}

?>
