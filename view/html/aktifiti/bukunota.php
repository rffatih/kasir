<?php
if (@$body) {
?>

<?php include $body["nav"] ?>

<div class="container table-responsive">
  <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th>Nomor Nota</th>
        <th>Waktu</th>
        <th>Pembeli</th>
        <th>Petugas</th>
        <th>Total(Rp)</th>
      </tr>
    </thead>
    <tbody>
      <?php dataTabel($data["data"]); ?>
    </tbody>
  </table>

  <!-- Suh Halaman -->
  <?php subHalaman($data["sbh"]); ?>
</div>

<?php
}
?>
