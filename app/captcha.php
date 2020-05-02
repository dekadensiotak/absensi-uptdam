<?php
session_start();
function acakCaptcha() {
  $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
  $font = "leadcoat.ttf";
  //untuk menyatakan $pass sebagai array
  $pass = array(); 

  //masukkan -2 dalam string length
  $panjangAlpha = strlen($alphabet) - 2; 
  for ($i = 0; $i < 5; $i++) {
      $n = rand(0, $panjangAlpha);
      $pass[] = $alphabet[$n];
  }

  //ubah array menjadi string
  return implode($pass); 
}

// untuk mengacak captcha
$code = acakCaptcha();
$_SESSION["code"] = $code;

//lebar dan tinggi captcha
$wh = imagecreate(173, 50);

//background color biru
$bgc = imagecolorallocate($wh, 22, 86, 165);

//text color abu-abu
$fc = imagecolorallocate($wh, 223, 230, 233);
// imagefill($wh, 0, 0, $bgc);

$fontfile = 'leadcoat.ttf';

imagestring($wh, 10, 50, 15,  $code, $fc);

// imagettftext($wh, 20, 30, 50, 15, $bgc, $fontfile, $code);

//buat gambar
header('content-type: image/png');
imagepng($wh);
imagedestroy($wh);
?>