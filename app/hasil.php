<?php
require_once "../db/db.php";
require_once "../function/function.php";

ob_start();
session_start();

date_default_timezone_set('ASIA/JAKARTA');

$kode_captcha = $_POST['kode-captcha'];
$no_induk     = $_POST['no-induk'];
$status       = $_POST['status'];

if ($kode_captcha === $_SESSION['code']) {

  if (mysqli_num_rows(search_no_induk($no_induk)) > 0) {

    $karyawan = search_no_induk($no_induk);

    if (absen($no_induk, $status)) {
      echo "<script>alert('Berhasil!');</script>";
    } else {
      echo "gagal absen";
      die();
    }
  } else {
    header('location: salahnoinduk.php');
  }
} else {
  header('location: salahcaptcha.php');
}

require_once "../assets/view/header.php";
?>
<div class="row justify-content-center mt-5 mb-3">
  <h1>Absen Berhasil</h1>
</div>
<div class="row justify-content-center">
  <table class="table">
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($karyawan)) : ?>
        <tr>
          <th scope="row">No Induk</th>
          <td><?= $row['no_induk']; ?></td>
          <td colspan="3">gambar</td>
        </tr>
        <tr>
          <th scope="row">Nama</th>
          <td><?= $row['nama']; ?></td>
        </tr>
        <tr>
          <th scope="row">Jabatan</th>
          <td><?= $row['jabatan']; ?></td>
        </tr>
        <tr>
          <th scope="row">Status</th>
          <td><?= $status . ' [jam ' . date("H:i") . ']'; ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<?php require_once "../assets/view/footer.php"; ?>