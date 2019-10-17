<?php
if (@$body) {
?>

<?php include $body["nav"]; ?>

<div class="container">
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Kode Barang</th>
				<th>Harga Pokok</th>
				<th>Harga Jual</th>
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
