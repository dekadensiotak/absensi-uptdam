<?php
require_once "db/db.php";
require_once "function/function.php";

ob_start();
session_start();

if (isset($_SESSION['username'])) {
  $alert = "<div class='row justify-content-center'><p>Anda sedang login | <a href='app/logout.php' class='logout'>Logout</a></p></div>";
} else {
  $alert = "<div class='row justify-content-center'><p><a href='app/logout.php'>Login?</a></p></div>";
}

date_default_timezone_set('ASIA/JAKARTA');
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Absensi UPTD Air Minum Kota Cimahi</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <div class="container">

    <div class="row justify-content-center mt-5">
      <h1>Ngabsen</h1>
    </div>
    <div class="row justify-content-center">
      <?= "<p>" . tgl_indo(date('Y-m-d-D')) . "</p>"; ?>
    </div>
    <div class="row justify-content-center mt-2">
      <form action="app/hasil.php" class="col-md-4 col" method="post">
        <div class="form-group">
          <label for="no-induk" class="">No Induk</label>
          <input type="text" class="form-control" id="no-induk" name="no-induk" required>
        </div>
        <div class="form-group">
          <label for="status" class="sr-only">Status</label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="status_masuk" value="Masuk">
            <label class="form-check-label" for="status_masuk">Masuk</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="status_pulang" value="Pulang">
            <label class="form-check-label" for="status_pulang">Pulang</label>
          </div>
        </div>
        <div class="form-group">
          <label for="kode-captcha" class="sr-only">Kode Captcha</label>
          <img src="app/captcha.php" alt="captcha" class="mb-1">
          <input type="text" class="form-control" id="kode-captcha" placeholder="Masukan Kode" name="kode-captcha" required>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Confirm</button>
      </form>
    </div>
    <?= $alert; ?>
    <?php require_once "assets/view/footer.php"; ?>

    <script>
      const logout = document.querySelector('.logout');

      logout.addEventListener('click', function(event) {
        confirm('yakin?');
      });
    </script>