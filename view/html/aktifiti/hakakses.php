<?php
if (@$body) {
?>

<div class="container-fluid">

	<?php include $body["nav"] ?>

	<form action="?" method="post" class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Password</th>
					<th>Nama</th>
					<th>Level</th>
					<th>Basisdata</th>
					<th>RWX</th>
				</tr>
			</thead>
			<tbody>
				<?php dataTabel($data); ?>
			</tbody>
		</table>
		<input type="hidden" name="setting" value="akses-proses">
	</form>
	<!-- <div id="testing"> ini testing </div> -->
</div>

<?php
}
?>
