<?php
if (isset($_POST['simpan'])) {
   require_once '../../config.php';
   $kode_matkul = $_POST['kode_matkul']; //didapat dari name form
   $nama_matkul = $_POST['nama_matkul']; //didapat dari name form
   $sks = $_POST['sks']; //didapat dari name form

   // proses insert
   $sql = $conn->query("INSERT INTO jurusan (kode_matkul, nama_matkul, sks) VALUES ('$kode_jurusan', '$nama_jurusan', '$sks')");

   // cek apakah data berhasil masuk ke database
   if ($sql) {
      session_start();
      $_SESSION['success_insert'] = 'Data berhasil ditambahkan!';
      header('location:index.php');
   } else {
      session_start();
      $_SESSION['error_insert'] = 'Data gagal ditambahkan!';
      header('location:index.php');
   }
} else {
   header('location:index.php');
}
