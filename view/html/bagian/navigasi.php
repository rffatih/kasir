<?php
$hal1=null;$hal2=null;$hal3=null;$hal4=null;$hal5=null;$hal6=null;$hal7=null;$hal8=null;
if (@$body) {
  switch ($_REQUEST["halaman"]) {
    case "pembelian":
      $hal1 = "active";break;
    case "pemasok":
      $hal2 = "active";break;
    case "departemen":
      $hal3 = "active";break;
    case "kodebarang":
      $hal4 = "active";break;
    case "persediaan":
      $hal5 = "active";break;
    case "hargajual":
      $hal6 = "active";break;
    case "fifo":
      $hal7 = "active";break;
    case "bukunota":
      $hal8 = "active";break;
    default:break;
  }
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a href="?" class="navbar-text">
    <i class='fas fa-home fa-3x'></i>
  </a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item  <?php echo $hal1 ?>">
        <a href="?halaman=pembelian" class="nav-link">Barang Masuk</a>
      </li>
      <li class="nav-item  <?php echo $hal2 ?>">
        <a href="?halaman=pemasok" class="nav-link">Pemasok</a>
      </li>
      <li class="nav-item  <?php echo $hal3 ?>">
        <a href="?halaman=departemen" class="nav-link">Departemen</a>
      </li>
      <li class="nav-item  <?php echo $hal4 ?>">
        <a href="?halaman=kodebarang" class="nav-link">Kode Barang</a>
      </li>
      <li class="nav-item  <?php echo $hal5 ?>">
        <a href="?halaman=persediaan" class="nav-link">Persediaan</a>
      </li>
      <li class="nav-item  <?php echo $hal6 ?>">
        <a href="?halaman=hargajual" class="nav-link">Harga</a>
      </li>
      <li class="nav-item  <?php echo $hal7 ?>">
        <a href="?halaman=fifo" class="nav-link">Pembelian</a>
      </li>
      <li class="nav-item  <?php echo $hal8 ?>">
        <a href="?halaman=bukunota" class="nav-link">Buku Nota</a>
      </li>
    </ul>
  </div>
</nav>



<?php
}
?>
