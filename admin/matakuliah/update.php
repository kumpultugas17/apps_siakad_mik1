<?php
if (isset($_POST['simpan'])) {
   require_once '../../config.php';
   $id = $_POST['id_matkul'];
   $kode_matkul = $_POST['kode_matkul']; //didapat dari name form
   $nama_matkul = $_POST['nama_matkul']; //didapat dari name form
   $sks = $_POST['sks']; //didapat dari name form

   // proses insert
   $sql = $conn->query("UPDATE mata_kuliah SET kode_matkul = '$kode_matkul', nama_matkul = '$nama_matkul', sks = '$sks' WHERE id_matkul = '$id'");

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
