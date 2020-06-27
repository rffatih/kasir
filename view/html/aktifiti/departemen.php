<?php
if (@$body) {
?>

<?php include $body["nav"]; ?>

<div class="container">
  <!-- Form Create -->
  <form class="form-inline" action="#">
  	<label for="nama" class="mr-2">Nama</label>
  	<input type="text" name="nama" id="nama" placeholder="Departemen" class="form-control mr-4" required>
  	<input type="submit" name="buat" value="Buat">
  </form>

  <!-- Table Departemen -->
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
