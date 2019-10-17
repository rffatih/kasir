<?php
if (@$body) {
?>

<?php include $body["nav"] ?>

<div class="container">
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>Kode Barang</th>
				<th>Nama Barang</th>
				<th>Jumlah</th>
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
