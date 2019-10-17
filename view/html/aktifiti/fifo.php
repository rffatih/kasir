<?php
if (@$body) {
?>


<?php include $body["nav"] ?>

<div class="container table-responsive">
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Kode Barang</th>
				<th>Nama</th>
				<th>Petugas</th>
				<th>Pemasok</th>
				<th>Tanggal</th>
				<th>Jumlah</th>
				<th>Total(Rp)</th>
			</tr>
		</thead>
		<tbody>
			<?php dataTabel($data["data"]); ?>
		</tbody>
	</table>

	<!-- Sub Halaman -->
	<?php subHalaman($data["sbh"]); ?>
</div>

<?php
}
?>
