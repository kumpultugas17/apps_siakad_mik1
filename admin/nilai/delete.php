<?php
if (isset($_GET['id'])) {
   require_once '../../config.php';
   $id = $_GET['id'];

   $cari_nama_file = $conn->query("SELECT avatar FROM mahasiswa WHERE id_mhs = '$id'");
   $result = mysqli_fetch_assoc($cari_nama_file);

   if ($result['avatar'] == null) {
      // proses delete
      $sql = $conn->query("DELETE FROM mahasiswa WHERE id_mhs = '$id'");

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
      $hapus_file = unlink("../../assets/image/avatar/" . $result['avatar']);

      if ($hapus_file) {
         // proses delete
         $sql = $conn->query("DELETE FROM mahasiswa WHERE id_mhs = '$id'");

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
      }
   }
} else {
   header('location:index.php');
}
