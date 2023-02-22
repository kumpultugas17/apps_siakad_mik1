<?php
if (isset($_POST['simpan'])) {
   require_once '../../config.php';
   $id = $_POST['id'];
   $nim = $_POST['nim'];
   $nama_lengkap = $_POST['nama_lengkap'];
   $jk = $_POST['jk'];
   $agama = $_POST['agama'];
   $tempat_lahir = $_POST['tempat_lahir'];
   $tanggal_lahir = $_POST['tgl_lahir'];
   $alamat = $_POST['alamat'];
   $telp = $_POST['telepon'];
   $email = $_POST['email'];
   $nama_ayah = $_POST['nama_ayah'];
   $nama_ibu = $_POST['nama_ibu'];
   $telp_ortu = $_POST['telepon_ortu'];
   $tahun_akademik = $_POST['tahun_akademik'];
   $status = $_POST['status'];
   $jurusan = $_POST['jurusan'];
   $date = date("Y-m-d");
   $nama_avatar = $_POST['nama_avatar'];

   // mengambil data file dari form
   $nama_file = strtolower($_FILES['avatar']['name']);
   $tmp_file = $_FILES['avatar']['tmp_name'];
   $extension = array_pop(explode(".", $nama_file));
   // enkripsi nama file
   $nama_file_enkripsi = sha1(md5(time() . $nama_file)) . '.' . $extension;
   // tentukan direktori penyimpanan file
   $path = "../../assets/image/avatar/" . $nama_file_enkripsi;

   if (empty($nama_file)) {
      $sql = $conn->query("UPDATE mahasiswa SET nim='$nim', nama='$nama_lengkap', jk='$jk', agama='$agama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', telp='$telp', email='$email', nama_ayah='$nama_ayah', nama_ibu='$nama_ibu', telp_ortu='$telp_ortu', tahun_akademik='$tahun_akademik', status='$status', jurusan_id='$jurusan', updated_at = '$date' WHERE id_mhs = '$id'");

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
      if (move_uploaded_file($tmp_file, $path)) {
         unlink("../../assets/image/avatar/$nama_avatar");
         // proses insert
         $sql = $conn->query("UPDATE mahasiswa SET nim='$nim', avatar='$nama_file_enkripsi', nama='$nama_lengkap', jk='$jk', agama='$agama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', telp='$telp', email='$email', nama_ayah='$nama_ayah', nama_ibu='$nama_ibu', telp_ortu='$telp_ortu', tahun_akademik='$tahun_akademik', status='$status', jurusan_id='$jurusan', updated_at = '$date' WHERE id_mhs = '$id'");

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
      }
   }
} else {
   header('location:index.php');
}
