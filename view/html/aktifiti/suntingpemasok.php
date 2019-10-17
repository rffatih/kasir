<?php
if (@$body) {
?>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?">Beranda</a></li>
		<li class="breadcrumb-item"><a href="?halaman=pemasok">Pemasok</a></li>
		<li class="breadcrumb-item">Sunting</li>
	</ol>
</nav>

<div class="container">
	<form action="#">
		<div class="form-group">
			<label for="id-p">ID</label>
			<input type="text" name="id-p" id="id-p" value="<?php echo $data[0][0]; ?>" class="form-control" readonly>
		</div>
		<div class="form-group">
			<label for="nama">Nama</label>
			<input type="text" name="nama" id="nama" value="<?php echo $data[0][1]; ?>" class="form-control" required>
		</div>
		<input type="submit" name="simpan" value="SIMPAN">
		<input type="submit" name="hapus"  value="HAPUS">
	</form>

	<div id="testing"></div>
</div>

<?php
}
?>
