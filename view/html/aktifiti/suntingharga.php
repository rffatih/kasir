<?php
if (@$body) {
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?">Beranda</a></li>
    <li class="breadcrumb-item"><a href="?halaman=hargajual">Harga Jual</a></li>
    <li class="breadcrumb-item">Sunting</li>
  </ol>
</nav>

<div class="container">
  <form action="#">
    <div class="form-group">
      <label for="id-d">Kode Barang</label>
      <input type="text" name="kodebarang" id="kodebarang" value="<?php echo $data[0][0]; ?>" class="form-control" readonly>
    </div>
    <div class="from-group">
      <label for="nama">Harga Pokok</label>
      <input type="text" name="rppokok-h" id="rppokok-h" value="<?php echo $data[0][1]; ?>" class="form-control mb-5" readonly>
    </div>
    <div class="from-group">
      <label for="nama">Harga Jual</label>
      <input type="text" name="rpjual-h" id="rpjual-h" value="<?php echo $data[0][2]; ?>" class="form-control mb-5">
    </div>
    <input type="submit" name="simpan" value="SIMPAN">
  </form>

  <div id="testing"></div>
</div>

<?php
}
?>
