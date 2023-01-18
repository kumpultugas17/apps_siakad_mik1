<?php
session_start();
if (!isset($_SESSION['email'])) {
   echo "<script>
      alert('Anda belum login, silahkan login dahulu!'); window.location.href='../login.php';
   </script>";
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
                           Jurusan
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>

   <main class="container">
      <div class="row my-4 gap-sm-4 gap-md-0 gap-lg-0">
         <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="card p-3 border-0 rounded-4">
               <div class="card-body px-1">
                  <form action="act_create.php" method="post">
                     <div class="mb-3">
                        <label for="kode_jurusan" class="form-label">Kode Jurusan</label>
                        <input type="text" name="kode_jurusan" id="kode_jurusan" class="form-control" placeholder="Masukkan kode jurusan">
                     </div>
                     <div class="mb-3">
                        <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
                        <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-control" placeholder="Masukkan nama jurusan">
                     </div>
                     <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select">
                           <option selected disabled>Pilih Jurusan</option>
                           <option value="1">Aktif</option>
                           <option value="0">Tidak Aktif</option>
                        </select>
                     </div>
                     <button type="submit" name="simpan" class="btn btn-sm btn-primary">Simpan</button>
                     <button type="reset" class="btn btn-sm btn-secondary">Reset</button>
                  </form>
               </div>
            </div>
         </div>
         <div class="col-sm-12 col-md-8 col-lg-8">
            <div class="card p-3 border-0 rounded-4">
               <div class="card-body px-1">
                  <table class="table table-striped">
                     <thead class="align-middle table-dark">
                        <tr>
                           <th class="text-center">No</th>
                           <th>Kode Jurusan</th>
                           <th>Nama Jurusan</th>
                           <th class="text-center">Status</th>
                           <th class="text-center">Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        require_once '../../config.php';

                        $no = 1;
                        $query = $conn->query("SELECT * FROM jurusan");
                        foreach ($query as $data) :
                        ?>
                           <tr>
                              <td class="text center"><?= $no++ ?></td>
                              <td><?= $data['kode_jurusan'] ?></td>
                              <td><?= $data['nama_jurusan'] ?></td>
                              <td class="text-center"><?= $data['status'] == '1' ? '<span class="badge text-bg-success">Aktif</span>' : '<span class="badge text-bg-danger">Tidak Aktif</span>' ?></td>
                              <td class="text-center">
                                 <button type="button" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                 </button>
                                 <button class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash3-fill"></i>
                                 </button>
                              </td>
                           </tr>
                        <?php
                        endforeach
                        ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </main>

   <!-- Bootstrap JS -->
   <script src="../../assets/js/bootstrap.bundle.js"></script>
</body>

</html>