<?php
if (isset($_POST['simpan'])) {
   require_once '../../config.php';
   $mhs_id = $_POST['mhs_id'];
   $kls_id = $_POST['kls_id'];
   $matkul_id = $_POST['matkul_id'];
   $nilai_tugas = $_POST['nilai_tugas'];
   $nilai_uts = $_POST['nilai_uts'];
   $nilai_uas = $_POST['nilai_uas'];

   $sql = $conn->query("INSERT INTO nilai (mhs_id, kls_id, matkul_id, nilai_tugas, nilai_uts, nilai_uas) VALUES ('$mhs_id', '$kls_id', '$matkul_id', '$nilai_tugas', '$nilai_uts', '$nilai_uas')") or die('Ada kesalahan pada query insert : ' . $conn->error);

   // cek apakah data berhasil masuk ke database
   if ($sql) {
      session_start();
      $_SESSION['success_insert'] = 'Data nilai berhasil ditambahkan!';
      header('location:index.php');
   } else {
      session_start();
      $_SESSION['error_insert'] = 'Data nilai gagal ditambahkan!';
      header('location:index.php');
   }
} else {
   header('location:index.php');
}
