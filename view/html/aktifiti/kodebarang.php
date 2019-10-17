<?php
if (@$body) {
?>

<?php include $body["nav"]; ?>

<div class="container">
  <div class="row">
    <div class="col">
      <!-- Form -->
      <form action="#">
        <div class="form-group">
          <label for="kodebarang">Kode Barang</label>
          <input type="text" name="kodebarang" id="kodebarang" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="satuan">Satuan</label>
          <input type="text" name="satuan" id="satuan" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="id-d">Departemen</label>
          <?php echo $data[1]; ?>
        </div>
        <input type="submit" name="buat" value="Buat">
      </form>
    </div>
    <div class="col">
      <!-- Table -->
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Kode Barang</th>
            <th>Nama</th>
            <th>Satuan</th>
            <th>Departemen</th>
            <th>+</th>
          </tr>
        </thead>
        <tbody>
          <?php dataTabel($data[0]); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php
}
?>
