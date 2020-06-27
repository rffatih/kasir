<?php
if (@$body) {
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?">Beranda</a></li>
    <li class="breadcrumb-item"><a href="?halaman=departemen">Departemen</a></li>
    <li class="breadcrumb-item">Sunting</li>
  </ol>
</nav>

<div class="container">
  <form action="#">
    <div class="form-group">
      <label for="id-d">ID</label>
      <input type="text" name="id-d" id="id-d" value="<?php echo $data[0][0]; ?>" class="form-control" readonly>
    </div>
    <div class="from-group">
      <label for="nama">Nama</label>
      <input type="text" name="nama" id="nama" value="<?php echo $data[0][1]; ?>" class="form-control mb-5">
    </div>
    <input type="submit" name="simpan" value="SIMPAN">
    <input type="submit" name="hapus" value="HAPUS">
  </form>

  <div id="testing"></div>
</div>

<?php
}
?>
