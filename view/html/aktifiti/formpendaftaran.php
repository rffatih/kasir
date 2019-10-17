<?php
if (@$body) {

	$halaman = @$_REQUEST["dari"];
?>


<section class="bg-dark container-fluid">
	<a href="?halaman=<?php echo $halaman ?>">
		<i class="fas fa-angle-double-left fa-3x"></i>
	</a>
</section>

<div class="container">
	<div class="row p-3">
		<div class="col-lg-4">
			<form method="POST" action="?" autocomplete="off">
				<div class="form-group">
					<label for="nama">Nama</label>
					<input type="text" name="nama" id="nama" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="id">Username</label>
					<input type="text" name="id" id="id" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="pass1">Password</label>
					<input type="password" name="pass1" placeholder="password" id="pass1" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="pass2">Password Verifikasi</label>
					<input type="password" name="pass2" placeholder="Verifikasi Password" id="pass2" class="form-control" required>
				</div>
				<input type="hidden" name="halaman" value="prosespendaftaran">
				<input type="hidden" name="dari"    value="<?php echo $halaman ?>">
				<input type="submit" name="" class="submit">
			</form>
		</div>
	</div>
</div>





<?php
	$Notif = new Notif;
	$Notif->index("df1");
	$Notif->index("df2");
?>

<?php
}
?>
