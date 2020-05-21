<?php
require_once "../db/db.php";
require_once "../function/function.php";

ob_start();
session_start();

if (!isset($_SESSION['username'])) header('location:login.php');

$no = 1;
$absen = tampilkan_absen();
$karyawan = tampilkan_karyawan();

if (isset($_POST['filter'])) {
  $no_induk = $_POST['nama'];
  $bulan = $_POST['bulan'];

  if ($no_induk == "" && $bulan == "") {
    $absen = tampilkan_absen();
  } else if ($bulan == "") {
    $absen = tampilkan_karyawan_by_no_induk($no_induk);
  } else {
    $absen = tampilkan_karyawan_by_no_induk_dan_bulan($no_induk, $bulan);
  }
}

require_once "../assets/view/header.php";
?>
<div class="row">
  <div class="col">
    <h1>TABELNYA</h1>
  </div>
  <div class="col">
    <p><a href="../index.php">Home</a></p>
  </div>
  <div class="col text-right">
    <p><a href="logout.php">Logout</a></p>
  </div>
</div>

<div class="row mb-3">
  <form action="" method="post" class="form-inline">
    <div class="col">
      <select class="custom-select" name="nama">
        <option selected value="">-- Pilih Nama --</option>
        <?php while ($row = mysqli_fetch_assoc($karyawan)) : ?>
          <option value="<?= $row['no_induk']; ?>"><?= $row['nama']; ?></option>
        <?php endwhile; ?>
      </select>
      <select class="custom-select" name="bulan">
        <option selected value="">-- Pilih Bulan --</option>
        <option value="01">Januari</option>
        <option value="02">Februari</option>
        <option value="03">Maret</option>
        <option value="04">April</option>
        <option value="05">Mei</option>
        <option value="06">Juni</option>
        <option value="07">Juli</option>
        <option value="08">Agustus</option>
        <option value="09">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
      </select>
      <button type="submit" name="filter" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>

<div class="row">
  <table class="table table-hover table-bordered" style="border: 2px solid black;">
    <thead>
      <tr class="bg-primary text-white">
        <th scope="col">No</th>
        <th scope="col">No Induk</th>
        <th scope="col">Nama</th>
        <th scope="col">Jabatan</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Status</th>
        <th scope="col">Jam</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($absen)) : ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $row['no_induk']; ?></td>
          <td><?= $row['nama']; ?></td>
          <td><?= $row['jabatan']; ?></td>
          <td><?= date('d M y', strtotime($row['tanggal'])); ?></td>
          <td><?= $row['status_absen']; ?></td>
          <td><?= date('H:i', strtotime($row['tanggal'])); ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<?php require_once "../assets/view/footer.php"; ?>