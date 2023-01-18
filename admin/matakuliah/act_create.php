<?php
if (isset($_POST['simpan'])) {
   require_once '../../config.php';
   $kode_jurusan = $_POST['kode_jurusan']; //didapat dari name form
   $nama_jurusan = $_POST['nama_jurusan']; //didapat dari name form
   $status = $_POST['status']; //didapat dari name form

   // proses insert
   $sql = $conn->query("INSERT INTO jurusan (kode_jurusan, nama_jurusan, status) VALUES ('$kode_jurusan', '$nama_jurusan', '$status')");

   // cek apakah data berhasil masuk ke database
   if ($sql) {
      header('location:index.php');
   } else {
      echo 'data gagal ditambahkan!';
   }
}
