<?php
if (@$body) {
?>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?">Beranda</a></li>
		<li class="breadcrumb-item"><a href="?halaman=kodebarang">Kode Barang</a></li>
		<li class="breadcrumb-item">Buku Rekab</li>
	</ol>
</nav>

<div class="container table-responsive">
	<table class="table tabel-striped table-hover">
		<thead>
			<tr>
				<th>Kode Barang</th>
				<th>Jumlah Beli</th>
				<th>(Rp) Beli</th>
				<th>Jumlah Jual</th>
				<th>(Rp) Jual</th>
				<th>Waktu</th>
			</tr>
		</thead>
		<tbody>
			<?php dataTabel($data["data"]) ?>
		</tbody>
	</table>

	<!-- Sub Halaman -->
	<?php subHalaman($data["sbh"]) ?>
</div>

<?php
}
?>
