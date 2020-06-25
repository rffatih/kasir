<?php
if (@$body) {
?>

<!-- Row 1 -->
<?php include $body["nav"]; ?>

<div class="container">
	<!-- Row 2 -->
	<div class="row">
		<div class="col">
			<!-- Form -->
			<form action="#" method="post">
				<div class="form-group">
					<label for="kb">Kode Barang</label>
					<input type="text" name="kb" id="kb" class="form-control">
					<span id="cekkb">?</span>
				</div>
				<div class="form-group">
					<label for="n">Jumlah Barang</label>
					<input type="number" min="0" name="n" id="n" class="form-control">
				</div>
				<div class="form-group">
					<label for="rp">Harga Beli (Rp)</label>
					<input type="number" min="0"  name="rp" id="rp" class="form-control">
				</div>
				<div class="form-group">
					<label for="id-s">Pemasok</label>
					<?php echo $data["pemasok"]; ?>
				</div>
				<input type="submit" name="pembelian-submit" value="KIRIM">
			</form>
		</div>
		<!-- Tabel Kode Barang -->
		<div class="col">
			<table class="table table-light table-striped table-hover">
				<thead class="thead-dark">
					<tr>
						<th>Kode Barang</th>
						<th>Nama</th>
						<th>Satuan</th>
						<th>Departemen</th>
					</tr>
				</thead>
				<tbody>
					<?php dataTabel($data["kodebarang"]); ?>
				</tbody>
			</table>
		</div>
	</div>

	<div id="keterangan"> </div>
</div>

<?php
}
?>
