<?php
session_start();
if (!isset($_SESSION['email'])) {
   echo "<script>
      alert('Anda belum login, silahkan login dahulu!'); window.location.href='../login.php';
   </script>";
}

if (isset($_GET['id'])) {
   require_once '../../config.php';
   $id = $_GET['id'];

   $sql = $conn->query("SELECT * FROM mahasiswa WHERE id_mhs = '$id'");
   $data = mysqli_fetch_assoc($sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>DASHBOARD</title>
   <!-- Bootstrap -->
   <link rel="stylesheet" href="../../assets/css/bootstrap.css">
   <!-- Icon -->
   <link rel="stylesheet" href="../../assets/icon/bootstrap-icons.css">
   <style>
      body {
         background-color: #f2f7ff;
         font-family: 'Quicksand';
      }

      .bg-navbar {
         background-color: #435ebe;
      }
   </style>
</head>

<body>
   <header>
      <nav class="bg-navbar navbar navbar-expand-lg navbar-dark">
         <div class="container">
            <a href="index.php" class="navbar-brand">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navBar" aria-controls="navBar" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navBar">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                     <a href="../index.php" class="nav-link active" aria-current="page">Dashboard</a>
                  </li>

                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Data Master
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../matakuliah/index.php">Mata Kuliah</a></li>
                        <li><a class="dropdown-item" href="../jurusan/index.php">Jurusan</a></li>
                        <li><a class="dropdown-item" href="../kelas/index.php">Kelas</a></li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="../mahasiswa/index.php">Mahasiswa</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="../nilai/index.php">Nilai</a>
                  </li>
               </ul>
               <div class="d-flex">
                  <div class="dropdown">
                     <a class="text-white dropdown-toggle nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../../assets/image/avatar/1.jpg" class="rounded-circle" height="25" alt="avatar">
                        <?= $_SESSION['nama']; ?>
                     </a>
                     <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Profil</a></li>
                        <li><a class="dropdown-item" href="#">Setting</a></li>
                        <li>
                           <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </nav>

      <div class="container pt-4">
         <div class="row">
            <div class="col-12">
               <div class="card rounded-3 border-0">
                  <div class="card-body">
                     <div class="breadcrumb mb-0">
                        <a href="../index.php" class="nav-link breadcrumb-item active fw-bold fs-6 text-secondary">
                           Dashboard
                        </a>
                        <a href="index.php" class="nav-link breadcrumb-item active fw-bold fs-6 text-secondary">
                           Edit Mahasiswa
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>

   <main class="container">
      <div class="row my-4">
         <div class="col-12">
            <div class="card p-3 border-0 rounded-4">
               <div class="card-body px-1">
                  <form class="row g-3" action="update.php" method="POST" enctype="multipart/form-data">
                     <input type="hidden" name="id" value="<?= $data['id_mhs'] ?>">
                     <div class="col-md-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="<?= $data['nim'] ?>">
                     </div>
                     <div class="col-md-6">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $data['nama'] ?>">
                     </div>
                     <div class="col-md-3">
                        <label for="jk" class="form-label">Jenis Kelamin</label>
                        <select id="jk" class="form-select" name="jk">
                           <option selected disabled>Pilih...</option>
                           <option value="l" <?= $data['jk'] == 'l' ? 'selected' : '' ?>>Laki-laki</option>
                           <option value="p" <?= $data['jk'] == 'p' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                     </div>
                     <div class="col-md-4">
                        <label for="agama" class="form-label">Agama</label>
                        <select id="agama" class="form-select" name="agama">
                           <option selected disabled>Pilih...</option>
                           <option value="Islam" <?= $data['agama'] == 'Islam' ? 'selected' : '' ?>>Islam</option>
                           <option value="Kristen" <?= $data['agama'] == 'Kristen' ? 'selected' : '' ?>>Kristen</option>
                           <option value="Khatolik" <?= $data['agama'] == 'Khatolik' ? 'selected' : '' ?>>Khatolik</option>
                           <option value="Hindu" <?= $data['agama'] == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                           <option value="Budha" <?= $data['agama'] == 'Budha' ? 'selected' : '' ?>>Budha</option>
                           <option value="Konghuchu" <?= $data['agama'] == 'Konghuchu' ? 'selected' : '' ?>>Konghuchu</option>
                        </select>
                     </div>
                     <div class="col-md-5">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $data['tempat_lahir'] ?>">
                     </div>
                     <div class="col-md-3">
                        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $data['tanggal_lahir'] ?>">
                     </div>
                     <div class="col-12">
                        <label for="alamat" class="form-label">Alamat Lengkap</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat'] ?>">
                     </div>
                     <div class="col-md-4">
                        <label for="telepon" class="form-label">Nomor Telepon</label>
                        <input type="number" class="form-control" id="telepon" name="telepon" value="<?= $data['telp'] ?>">
                     </div>
                     <div class="col-md-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $data['email'] ?>">
                     </div>
                     <div class="col-md-4">
                        <label for="telepon_ortu" class="form-label">No. telepon_ortu Orang Tua</label>
                        <input type="number" class="form-control" id="telepon_ortu" name="telepon_ortu" value="<?= $data['telp_ortu'] ?>">
                     </div>
                     <div class="col-md-6">
                        <label for="nama_ayah" class="form-label">Nama Ayah</label>
                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="<?= $data['nama_ayah'] ?>">
                     </div>
                     <div class="col-md-6">
                        <label for="nama_ibu" class="form-label">Nama Ibu</label>
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?= $data['nama_ibu'] ?>">
                     </div>
                     <div class="col-md-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select id="jurusan" class="form-select" name="jurusan">
                           <option selected disabled>Pilih...</option>
                           <?php
                           require_once '../../config.php';
                           $jur = $conn->query("SELECT * FROM jurusan");
                           foreach ($jur as $j) :
                           ?>
                              <option value="<?= $j['id_jur'] ?>" <?= $data['jurusan_id'] == $j['id_jur'] ? 'selected' : '' ?>><?= $j['nama_jurusan'] ?></option>
                           <?php endforeach ?>
                        </select>
                     </div>
                     <div class="col-md-3">
                        <label for="tahun_akademik" class="form-label">Tahun Akademik</label>
                        <input type="number" class="form-control" id="tahun_akademik" name="tahun_akademik" value="<?= $data['tahun_akademik'] ?>">
                     </div>
                     <div class="col-md-3">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" class="form-select" name="status">
                           <option selected disabled>Pilih...</option>
                           <option value="1" <?= $data['status'] == 1 ? 'selected' : '' ?>>Aktif</option>
                           <option value="2" <?= $data['status'] == 2 ? 'selected' : '' ?>>Lulus</option>
                           <option value="0" <?= $data['status'] == 0 ? 'selected' : '' ?>>Tidak Aktif</option>
                        </select>
                     </div>
                     <div class="col-md-3">
                        <label for="avatar" class="form-label">Upload File</label>
                        <input type="file" name="avatar" id="avatar" class="form-control">
                     </div>
                     <div class="col-12">
                        <img src="../../assets/image/avatar/<?= $data['avatar'] ?>" class="img-thumbnail" alt="avatar" width="70px">
                        <input type="hidden" name="nama_avatar" value="<?= $data['avatar'] ?>">
                     </div>
                     <div class="col-12">
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                        <a href="index.php" class="btn btn-secondary">Batal</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </main>

   <!-- Bootstrap JS -->
   <script src="../../assets/js/bootstrap.bundle.js"></script>
</body>

</html>