<?php
// tanggal indonesia
function tgl_indo($tanggal)
{
  $bulan = array(
    1 => 'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );

  $hari = array(
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu',
    'Sun' => 'Minggu'
  );

  $pecahkan = explode('-', $tanggal);

  return $hari[$pecahkan[3]] . ', ' . $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}

function run($query)
{
  global $link;
  return mysqli_query($link, $query);
}

function search_no_induk($no_induk)
{
  $query = "SELECT * FROM karyawan WHERE no_induk LIKE '%$no_induk%'";
  return run($query);
}

function absen($no_induk, $status)
{
  $query = "INSERT INTO absensi (no_induk, status_absen) VALUES ('$no_induk', '$status')";
  return run($query);
}

function login($username, $password)
{
  $query = "SELECT * FROM akun WHERE username = '$username' AND password = '$password'";
  $result = run($query);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['id']       = $row['id'];
    $_SESSION['username'] = $row['username'];
    header('location:table.php');
  } else {
    echo "<script>alert('Username / Password yang anda masukan salah!');</script>";
  }

  return true;
}

function tampilkan_absen()
{
  $query = "SELECT * FROM absensi JOIN karyawan ON absensi.no_induk = karyawan.no_induk ORDER BY tanggal DESC";
  return run($query);
}

function tampilkan_karyawan()
{
  $query = "SELECT * FROM karyawan";
  return run($query);
}

function tampilkan_karyawan_by_no_induk($no_induk)
{
  $query = "SELECT * FROM absensi JOIN karyawan ON absensi.no_induk = karyawan.no_induk WHERE absensi.no_induk = '$no_induk' ORDER BY tanggal DESC";
  return run($query);
}

function tampilkan_karyawan_by_no_induk_dan_bulan($no_induk, $bulan)
{
  $query = "SELECT * FROM absensi JOIN karyawan ON absensi.no_induk = karyawan.no_induk WHERE absensi.no_induk = '$no_induk' AND MONTH(absensi.tanggal) = '$bulan' ORDER BY tanggal DESC";
  return run($query);
}

function hapus_absensi($id_absensi)
{
  $query = "DELETE FROM absensi WHERE id_absensi = '$id_absensi'";
  return run($query);
}
