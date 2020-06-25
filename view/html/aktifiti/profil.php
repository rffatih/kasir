<?php
if (@$body) {
?>

<div class="container-fluid">

	<?php include $body["nav"] ?>

	<div class="d-flex justify-content-around mb-3">
		<div class="col-6 border">
			<div class="row form-group">
				<label for="prf-id" class="col-form-label col-12 col-lg-3">Username</label>
				<div class="col col-form-label">
					<span id="prf-id"><?php echo $_SESSION["id"]; ?></span>
				</div>
			</div>
			<div class="row form-group">
				<label for="prf-nm" class="col-form-label col-12 col-lg-3">Nama</label>
				<div class="col">
					<?php
					if (isset($data[0][0]) && $data[0][0] == 5) {
						echo nama();
					} else {
						echo "<input type='text' name='nama' value='".nama()."' id='prf-nm' class='form-control'>";
					}
					?>
				</div>
			</div>
		</div>
		<div class="col-6 border">
			<div class="row form-group">
				<label for="prf-pass1" class="col-form-label col-12 col-lg-3">Password Baru</label>
				<div class="col">
					<input type="password" name="password" class="form-control tak-spasi" id="prf-pass1">
				</div>
			</div>
			<div class="row form-group">
				<label for="prf-pass2" class="col-form-label col-12 col-lg-3">Password Baru</label>
				<div class="col">
					<input type="password" name="password" id="prf-pass2" class="form-control tak-spasi">
				</div>
			</div>
		</div>
	</div>
	<div class="d-flex justify-content-around">
		<input type="submit" value="Simpan Biodata" id="prf-tbl-a">
		<input type="password" name="password" class="tak-spasi form-control col-3" id="prf-aut" placeholder="Masukkan password">
		<input type="submit" value="Ganti Password" id="prf-tbl-b">
	</div>
</div>

<div class="keterangan"> </div>

<?php
}
?>
