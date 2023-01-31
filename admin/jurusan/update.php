<?php
if (isset($_POST['simpan'])) {
   require_once '../../config.php';
   $id = $_POST['id_jur'];
   $kode_jurusan = $_POST['kode_jurusan']; //didapat dari name form
   $nama_jurusan = $_POST['nama_jurusan']; //didapat dari name form
   $status = $_POST['status']; //didapat dari name form

   // proses insert
   $sql = $conn->query("UPDATE jurusan SET kode_jurusan = '$kode_jurusan', nama_jurusan = '$nama_jurusan', status_jurusan = '$status' WHERE id_jur = '$id'");

   // cek apakah data berhasil diupdate
   if ($sql) {
      session_start();
      $_SESSION['success_update'] = 'Data berhasil diupdate!';
      header('location:index.php');
   } else {
      session_start();
      $_SESSION['error_update'] = 'Data gagal diupdate!';
      header('location:index.php');
   }
} else {
   header('location:index.php');
}
