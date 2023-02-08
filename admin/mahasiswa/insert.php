<?php
if (isset($_POST['simpan'])) {
   require_once '../../config.php';
   $nim = $_POST['nim'];
   $nama_lengkap = $_POST['nama_lengkap'];
   $jk = $_POST['jk'];
   $jurusan = $_POST['jurusan'];

   // proses insert
   $sql = $conn->query("INSERT INTO mahasiswa (nim, nama, jk, jurusan_id) VALUES ('$nim', '$nama_lengkap', '$jk', '$jurusan')");

   // cek apakah data berhasil masuk ke database
   if ($sql) {
      session_start();
      $_SESSION['success_insert'] = 'Mahasiswa baru berhasil ditambahkan!';
      header('location:index.php');
   } else {
      session_start();
      $_SESSION['error_insert'] = 'Gagal menambahkan mahasiswa baru!';
      header('location:index.php');
   }
} else {
   header('location:index.php');
}
