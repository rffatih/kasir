<div class="row bg-dark mb-4">
  <div class="col-12 col-lg-4">
    <div class="d-flex p-2 justify-content-between">
      <a href="?">
        <i class='fas fa-home fa-3x'></i>
      </a>
      <?php
      if ($_REQUEST["halaman"] != "profil") {
        echo "<a href='?halaman=profil'><i class='fas fa-user-tie fa-3x'></i></a>";
      }
      if ($_REQUEST["halaman"] != "hakakses" AND level() >= 2) {
        echo "<a href='?halaman=hakakses'><i class='fas fa-unlock-alt fa-3x'></i></a>";
      }
      if ($_REQUEST["halaman"] != "basisdata" AND level() >= 2) {
        echo "<a href='?halaman=basisdata'><i class='fas fa-book fa-3x'></i></a>";
      }
      ?>
      <a href="?halaman=formpendaftaran&dari=<?php echo @$_REQUEST["halaman"] ?>">
        <i class='fas fa-file-signature fa-3x'></i>
      </a>
    </div>
  </div>
</div>
