<?php
if (@$body) {
?>

<?php include $body["nav"]; ?>

<div class="container">
  <!-- Form Create  -->
  <form class="form-inline" action="#">
    <label for="nama" class="mr-2">Nama Pemasok :</label>
    <input type="text" name="nama" id="nama" placeholder="Nama Perusahaan" class="form-control mr-2" required>
    <input type="submit" name="Buat" value="Buat">
  </form>

  <!-- Table Pemasok -->
  <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th>Nama</th>
        <th>+</th>
      </tr>
    </thead>
    <tbody>
      <?php dataTabel($data); ?>
    </tbody>
  </table>
</div>

<?php
}
?>
