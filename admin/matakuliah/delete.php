<?php
if (isset($_GET['id'])) {
   require_once '../../config.php';
   $id = $_GET['id'];

   // proses delete
   $sql = $conn->query("DELETE FROM mata_kuliah WHERE id_matkul = '$id'");

   // cek apakah data berhasil dihapus
   if ($sql) {
      session_start();
      $_SESSION['success_delete'] = 'Data berhasil dihapus!';
      header('location:index.php');
   } else {
      session_start();
      $_SESSION['error_delete'] = 'Data gagal dihapus!';
      header('location:index.php');
   }
} else {
   header('location:index.php');
}
