<?php
if (@$body) {
?>

<section class="bg-dark container-fluid py-2 mb-2">
	<a href="?">
		<i class="fas fa-home fa-3x"></i>
	</a>
</section>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-9 table-responsive">
			<!-- Kertas Nota -->
			<div id="tgl" style="float: right;"></div>
			<form action="#" method="post" id="kertas-nota">
				<table>
					<tbody>
						<tr>
							<td>No. Nota</td>
							<td>:</td>
							<td><input type="text" name="no-nota" id="no-nota" placeholder="No nota" class="form-control"></td>
						</tr>
						<tr>
							<td>Kepada Sodara/i</td>
							<td>:</td>
							<td><input type="text" name="yth" id="yth" placeholder="Pembeli" class="form-control"></td>
						</tr>
					</tbody>
				</table>
				<table class="table table-sm table-bordered">
					<thead>
						<tr>
							<th rowspan="2">Kode Barang</th>
							<th colspan="2">Banyaknya</th>
							<th rowspan="2">Nama Barang</th>
							<th rowspan="2">Harga Satuan (Rp)</th>
							<th rowspan="2">Jumlah (Rp)</th>
						</tr>
						<tr>
							<th>Jumlah</th>
							<th>Satuan</th>
						</tr>
					</thead>
					<tbody>

					</tbody>

					<tr class="target-nota-js">
						<td class="in-0"><input type="text" name="kode-barang[]" class="kode-matic form-control"></td>
						<td class="in-1"><input type="number" name="jumlah-barang[]" class="jumlah-matic form-control" min="0"></td>
						<td class="satuan"></td>
						<td class="nama"></td>
						<td class="harga"></td>
						<td class="total"></td>
						<input type="hidden" name="harga[]" class="harga-data-input">
						<input type="hidden" name="total[]" class="total-data-input">
					</tr>
					<tr>
						<td style="text-align: center;" id="tambah-baris"><i class="fas fa-folder-plus fa-2x"></i></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td colspan="5">Jumlah</td>
						<td id="total-semua"></td>
						<input type="hidden" name="total-semua" id="total-semua-datin">
					</tr>
					<tr>
						<td colspan="5">PPn 10%</td>
						<td id="ppn"></td>
						<input type="hidden" name="ppn" id="ppn-datin">
					</tr>
					<tr>
						<td colspan="5">Total</td>
						<td style="font-weight: bold;" id="pembayaran"></td>
						<input type="hidden" name="pembayaran" id="pembayaran-datin">
					</tr>
				</table>
				<input type="submit" name="submit" value="TTD Transaksi">
			</form>
		</div>

		<div class="col-lg-3">
			<!-- Lis Kode Barang -->
			<table class="table">
				<thead>
					<tr>
						<th>Kode Barang</th>
						<th>Nama</th>
						<th>/</th>
						<th>Rp</th>
					</tr>
				</thead>
				<tbody>
					<?php dataTabel($data); ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
<!-- </pengangkut -->

<?php
}
?>
