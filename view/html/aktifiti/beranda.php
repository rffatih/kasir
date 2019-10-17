<?php
if (@$body) {
?>
<div class="testing container-fluid d-flex flex-column">

	<section class="row border-bottom">
		<div class="col-auto p-2 p-lg-3">
			<a href="?halaman=logout">
				<span class="fa-stack fa-2x">
					<i class="far fa-circle fa-stack-2x"></i>
					<i class="fas fa-door-open fa-stack-1x"></i>
				</span>
			</a>
		</div>
		<div class="col p-2 text-center">
			Selamat Datang
			<h1>
				<?php echo nama(); ?>
			</h1>
		</div>
		<div class="col-auto p-2 p-lg-3">
			<a href="?halaman=profil">
				<span class="fa-stack fa-2x">
					<i class="far fa-circle fa-stack-2x"></i>
					<i class="fas fa-tools fa-stack-1x"></i>
				</span>
			</a>
		</div>
	</section>

	<div class="row">
		<div class="col-12 col-lg text-center mt-5 mt-lg-5">
			<a href="?halaman=penjualan">
				<i class="fas fa-cash-register fa-10x"></i>
			</a>
		</div>
		<div class="col-12 col-lg text-center mt-5 mt-lg-5">
			<a href="?halaman=pembelian">
				<i class="fas fa-warehouse fa-10x"></i>
			</a>
		</div>
	</div>
</div>

<?php
}
?>
