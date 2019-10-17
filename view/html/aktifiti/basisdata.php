<?php
if (@$body) {
?>

<div class="container-fluid">

	<?php include $body["nav"] ?>

	<div class="form-inline">
		<input type="text" name="nama-db" id="input-db" placeholder="Masukkan Nama Baru" class="form-control mr-3">
		<input type="submit" value="Buat Basis Data" class="submit mt-2 mt-sm-0">
	</div>
	<div class="keterangan"> </div>
	<h3 class="mt-3">BASIS DATA</h3>
	<div class="row">
		<div class="col-lg-6">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Hapus</th>
					</tr>
				</thead>
				<tbody>
					<?php dataTabel($data); ?>
				</tbody>
			</table>
		</div>
	</div>

</div>

<?php
}
?>
