<?php

if (!session_id()) {
  session_start();
}

require_once '../app/init.php';

$app = new App;

/*
  Catatan .htaccess:
  Options -Multiviews -> buat mengatur beberapa file folder

  RewriteEngine On --> buat mengatur routing di public
  RewriteCond %{REQUEST_FILENAME} !-d -> kondisi dimana parameter yg dikirim adalah nama direktori gabisa dibuka
  RewriteCond %{REQUEST_FILENAME} !-f -> kondisi dimana parameter yg dikirim adalah nama file gabisa dibuka
  RewriteRule ^(.*)$ index.php?url=$1 [L] -> tambahan aturan untuk parameter nama file, nama file tsb akan
  menjadi parameter di query url, lalu [L] maksud'a adalah kalo ada 1 kondisi yang terpenuhi, maka gabisa
  lanjut cek kondisi lain (harus selesaikan 1 aturan'a dahulu).
*/
