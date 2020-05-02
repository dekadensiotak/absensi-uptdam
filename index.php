<?php
require_once "assets/view/header.php";
require_once "db/db.php";
require_once "function/function.php";

if(isset($_SESSION['username'])) {
  $alert = "<div class='row justify-content-center'><p>Anda sedang login | <a href='app/logout.php'>Logout</a></p></div>";
} else {
  $alert = "<div class='row justify-content-center'><p><a href='app/logout.php'>Login?</a></p></div>";
}
?>

<div class="row justify-content-center">
  <h1>Ngabsen</h1>
</div>
<div class="row justify-content-center">
  <?php
    date_default_timezone_set('ASIA/JAKARTA');
    echo "<p>" . tgl_indo(date('Y-m-d-D')) . "</p>";
  ?>
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

<?=$alert;?>

<?php require_once "assets/view/footer.php";?>