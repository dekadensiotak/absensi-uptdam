<?php
require_once "../db/db.php";
require_once "../function/function.php";
require_once "../assets/view/header.php";

if(!isset($_SESSION['username'])) header('location:login.php');

$no = 1;
$absen = tampilkan_absen();
$karyawan = tampilkan_karyawan();

if(isset($_POST['filter'])) {
  $no_induk = $_POST['nama'];

  $absen = tampilkan_karyawan_by_no_induk($no_induk);
}
?>

<div class="row">
  <div class="col">
    <h1>TABELNYA</h1>
  </div>
  <div class="col text-right">
    <p><a href="logout.php">Logout</a></p>
  </div>
</div>

<div class="row mb-3">
  <form action="" method="post" class="form-inline">
    <div class="col">
      <select class="custom-select" name="nama">
        <option selected>-- Pilih Nama --</option>
        <?php while($row = mysqli_fetch_assoc($karyawan)): ?>
        <option value="<?=$row['no_induk'];?>"><?=$row['nama'];?></option>
        <?php endwhile; ?>
      </select>
    </div>
    <button type="submit" name="filter" class="btn btn-primary">Submit</button>
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
      <?php while($row = mysqli_fetch_assoc($absen)): ?>
      <tr>
        <td><?=$no++;?></td>
        <td><?=$row['no_induk'];?></td>
        <td><?=$row['nama'];?></td>
        <td><?=$row['jabatan'];?></td>
        <td><?=date('d M y', strtotime($row['tanggal']));?></td>
        <td><?=$row['status_absen'];?></td>
        <td><?=date('H:i', strtotime($row['tanggal']));?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<?php require_once "../assets/view/footer.php";?>