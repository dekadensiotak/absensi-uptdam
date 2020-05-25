<?php
require_once "../db/db.php";
require_once "../function/function.php";

if (isset($_GET['id_absensi'])) {
  if (hapus_absensi($_GET['id_absensi'])) {
    header('location:table.php');
  } else {
    echo 'gagal menghapus data';
  }
} else {
  echo 'id_absen gak ke set';
}
