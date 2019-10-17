<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="view/gambar/icon.ico">
    <link rel="stylesheet" href="view/fontawesome/css/all.css">
    <link rel="stylesheet" href="view/css/bootstrap.css">
    <script src="view/script/js/jquery.js"></script>
    <script src="view/script/sistem/base.js"></script>
    <title>SMK N 1 Bojonegoro</title>
    <?php
    if (@$head["css"]) {
      foreach ($head["css"] as $key) {
        echo "<link rel='stylesheet' type='text/css' href='$key'>";
      }
    }
    if (@$head["jss"]) {
      foreach ($head["jss"] as $key) {
        echo "<script type='text/javascript' src='$key'></script>";
      }
    }
    ?>
  </head>
  <body>

    <?php
    if (@$body) {
      include $body["akt"];
    }
    ?>

    <script src="view/script/js/popper.js"></script>
    <script src="view/script/js/bootstrap.js"></script>
  </body>
</html>
