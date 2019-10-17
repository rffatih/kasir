<?php
if (@$body) {
?>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?">Beranda</a></li>
		<li class="breadcrumb-item"><a href="?halaman=bukunota&a=<?php echo $_REQUEST["a"] ?>">Buku Nota</a></li>
		<li class="breadcrumb-item">Detail Nota</li>
	</ol>
</nav>

<!-- Kertas Nota -->
<div class="container">
	<div class="row">
		<div class="col-12">
			<div><?php echo tanggalPrint($data["nomornota"][0][2]) ?></div>
			<table>
				<tbody>
					<tr>
						<td>No. Nota</td>
						<td>:</td>
						<td><?php echo $data["nomornota"][0][1] ?></td>
					</tr>
					<tr>
						<td>Kepada Sodara/i</td>
						<td>:</td>
						<td><?php echo $data["nomornota"][0][3] ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-12 table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th rowspan="2">Kode Barang</th>
	          <th rowspan="2">Nama Barang</th>
						<th colspan="2">Banyaknya</th>
						<th rowspan="2">Harga Satuan (Rp)</th>
						<th rowspan="2">Jumlah (Rp)</th>
					</tr>
					<tr>
						<th>Jumlah</th>
						<th>Satuan</th>
					</tr>
				</thead>
				<tbody>
					<?php dataTabel($data["isinota"]); ?>
					<tr>
						<td colspan="5">Jumlah</td>
						<td id="total-semua"><?php echo $data["nomornota"][0][7] ?></td>
					</tr>
					<tr>
						<td colspan="5">PPn 10%</td>
						<td id="ppn">-</td>
					</tr>
					<tr>
						<td colspan="5">Total</td>
						<td style="font-weight: bold;" id="pembayaran"><?php echo $data["nomornota"][0][7] ?></td>
					</tr>
				</tbody>
			</table>
			<a href="?halaman=bukunota&a=<?php echo $data['a']; ?> "><button type="button" name="button">kembali</button></a>
		</div>
	</div>
</div> <!-- </pengangkut -->

<?php
}
?>
