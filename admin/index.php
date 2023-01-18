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
   <link rel="stylesheet" href="../assets/css/bootstrap.css">
   <style>
      body {
         background-color: #f2f7ff;
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
                     <a href="index.php" class="nav-link active" aria-current="page">Dashboard</a>
                  </li>

                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Data Master
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="matakuliah/index.php">Mata Kuliah</a></li>
                        <li><a class="dropdown-item" href="jurusan/index.php">Jurusan</a></li>
                        <li><a class="dropdown-item" href="kelas/index.php">Kelas</a></li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="mahasiswa/index.php">Mahasiswa</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="nilai/index.php">Nilai</a>
                  </li>
               </ul>
               <div class="d-flex">
                  <div class="dropdown">
                     <a class="text-white dropdown-toggle nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../assets/image/avatar/1.jpg" class="rounded-circle" height="25" alt="avatar">
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
                        <a href="index.php" class="nav-link breadcrumb-item active fw-bold fs-6 text-secondary">
                           Dashboard
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>

   Konten .... Konten

   <!-- Bootstrap JS -->
   <script src="../assets/js/bootstrap.bundle.js"></script>
</body>

</html>