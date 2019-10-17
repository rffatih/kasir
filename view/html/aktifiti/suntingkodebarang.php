<?php
if (@$body) {
?>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="?">Beranda</a></li>
		<li class="breadcrumb-item"><a href="?halaman=kodebarang">Kode Barang</a></li>
		<li class="breadcrumb-item">Sunting</li>
	</ol>
</nav>

<div class="container">
	<form action="#">
		<div class="from-group">
			<label for="kodebarang">Kode Barang</label>
			<input type="text" name="kodebarang" id="kodebarang" value="<?php echo $data["kb"][0][0] ?>" class="form-control" readonly>
		</div>
		<div class="form-group">
			<label for="nama">Nama</label>
			<input type="text" name="nama" id="nama" value="<?php echo $data["kb"][0][1] ?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="satuan">Satuan</label>
			<input type="text" name="satuan" id="satuan" value="<?php echo $data["kb"][0][2]; ?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="id-d">Departemen</label>
			<?php
			if ($data["dep"] != null) {
				$abc = null;
				$i = 0;
				$selected = null;
				$abc = "<select class='form-control' name='id-d' id='id-d'>";
				foreach ($data["dep"] as $row) {
					if ($data["dep"][$i][1] == $data["kb"][0][3]) {
						$selected = "selected";
					}
					$abc .= "<option value='".$data["dep"][$i][0]."' $selected>".$data["dep"][$i][1]."</option>";
					$i++;
					$selected = null;
				}
				$abc .= "</select>";
				echo $abc;
			}
			?>
		</div>
		<input type="submit" name="simpan" value="SIMPAN">
		<input type="submit" name="hapus" value="HAPUS">
	</form>

	<div id="testing"></div>
</div>

<?php
}
?>
