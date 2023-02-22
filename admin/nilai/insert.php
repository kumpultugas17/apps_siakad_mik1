<?php
if (isset($_POST['simpan'])) {
   require_once '../../config.php';
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

   // mengambil data file dari form
   $nama_file = strtolower($_FILES['avatar']['name']);
   $tmp_file = $_FILES['avatar']['tmp_name'];
   $extension = array_pop(explode(".", $nama_file));
   // enkripsi nama file
   $nama_file_enkripsi = sha1(md5(time() . $nama_file)) . '.' . $extension;
   // tentukan direktori penyimpanan file
   $path = "../../assets/image/avatar/" . $nama_file_enkripsi;

   if (empty($nama_file)) {
      $sql = $conn->query("INSERT INTO mahasiswa (nim, nama, jk, agama, tempat_lahir, tanggal_lahir, alamat, telp, email, nama_ayah, nama_ibu, telp_ortu, tahun_akademik, status, jurusan_id) VALUES ('$nim', '$nama_lengkap', '$jk', '$agama', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$telp', '$email', '$nama_ayah', '$nama_ibu', '$telp_ortu', '$tahun_akademik', '$status', '$jurusan')") or die('Ada kesalahan pada query insert : ' . $conn->error);

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
      // proses upload file
      if (move_uploaded_file($tmp_file, $path)) {
         // jika berhasil upload maka insert ke database
         $sql = $conn->query("INSERT INTO mahasiswa (nim, avatar, nama, jk, agama, tempat_lahir, tanggal_lahir, alamat, telp, email, nama_ayah, nama_ibu, telp_ortu, tahun_akademik, status, jurusan_id) VALUES ('$nim', '$nama_file_enkripsi', '$nama_lengkap', '$jk', '$agama', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$telp', '$email', '$nama_ayah', '$nama_ibu', '$telp_ortu', '$tahun_akademik', '$status', '$jurusan')") or die('Ada kesalahan pada query insert : ' . $conn->error);

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
      }
   }
} else {
   header('location:index.php');
}
