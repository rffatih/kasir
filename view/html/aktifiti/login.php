<?php
if (@$body) {
?>

<div id="box-login">
	<form class="tabel-login" action="?" method="post">
		<table>
			<tr>
				<td>ID</td>
				<td>:</td>
				<td><input type="text" name="id" value="" placeholder="" class="tak-spasi"></td>
			</td>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input type="password" name="password" value="" placeholder="" class="tak-spasi"></td>
			</tr>
		</table>
		<input type="hidden" name="halaman" value="login">
		<input type="submit" name="submit" value="Masuk" class="submit"></input>
	</form>
	<a href="?halaman=formpendaftaran">Daftar?</a>
	<?php
		$Notif = new Notif;
		$Notif->index("lg1");
		$Notif->index("df0");
	?>
</div>

<?php
}
?>
