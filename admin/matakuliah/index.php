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
   <!-- Icon -->
   <link rel="stylesheet" href="../../assets/icon/bootstrap-icons.css">
   <!-- SweetAlert -->
   <link rel="stylesheet" href="../../plugins/extensions/sweetalert2/sweetalert2.css">
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
                  <form action="insert.php" method="POST">
                     <div class="mb-3">
                        <label for="kode_matkul" class="form-label">Kode Jurusan</label>
                        <input type="text" name="kode_matkul" id="kode_matkul" class="form-control" placeholder="Masukkan kode matakuliah">
                     </div>
                     <div class="mb-3">
                        <label for="nama_matkul" class="form-label">Nama Jurusan</label>
                        <input type="text" name="nama_matkul" id="nama_matkul" class="form-control" placeholder="Masukkan nama matakuliah">
                     </div>
                     <div class="mb-3">
                        <label for="sks" class="form-label">SKS</label>
                        <input type="number" name="sks" id="sks" class="form-control" placeholder="Masukkan jumlah SKS">
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
                           <th>Kode</th>
                           <th>Mata Kuliah</th>
                           <th class="text-center">SKS</th>
                           <th class="text-center">Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        require_once '../../config.php';

                        $no = 1;
                        $query = $conn->query("SELECT * FROM mata_kuliah");
                        foreach ($query as $data) :
                        ?>
                           <tr>
                              <td class="text center"><?= $no++ ?></td>
                              <td><?= $data['kode_matkul'] ?></td>
                              <td><?= $data['nama_matkul'] ?></td>
                              <td class="text-center"><?= $data['sks'] ?></td>
                              <td class="text-center">
                                 <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $data['id_matkul'] ?>">
                                    <i class="bi bi-pencil-square"></i>
                                 </button>
                                 <button class="btn btn-sm btn-danger" onclick="confirmDelete('delete.php?id=<?= $data['id_matkul'] ?>')">
                                    <i class="bi bi-trash3-fill"></i>
                                 </button>
                              </td>
                           </tr>
                           <!-- Modal Edit -->
                           <div class="modal fade" id="edit<?= $data['id_matkul'] ?>" data-bs-backdrop="static" data-bs-keyword="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="staticBackdropLabel">
                                          Edit Matakuliah
                                       </h5>
                                       <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                       <form action="update.php" method="POST">
                                          <input type="hidden" name="id_matkul" value="<?= $data['id_matkul'] ?>">
                                          <div class="mb-3">
                                             <label for="kode_matkul" class="form-label">Kode</label>
                                             <input type="text" name="kode_matkul" id="kode_matkul" class="form-control" value="<?= $data['kode_matkul'] ?>">
                                          </div>
                                          <div class="mb-3">
                                             <label for="nama_matkul" class="form-label">Matakuliah</label>
                                             <input type="text" name="nama_matkul" id="nama_matkul" class="form-control" value="<?= $data['nama_matkul'] ?>">
                                          </div>
                                          <div class="mb-3">
                                             <label for="sks" class="form-label">SKS</label>
                                             <input type="number" class="form-control" name="sks" id="sks" value="<?= $data['sks'] ?>">
                                          </div>
                                          <button type="submit" name="simpan" class="btn btn-sm btn-primary">Simpan</button>
                                          <button type="reset" class="btn btn-sm btn-secondary">Reset</button>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- End -->
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
   <!-- SweetAlert JS -->
   <script src="../../plugins/extensions/sweetalert2/sweetalert2.all.js"></script>

   <!-- Konfirmasi Delete -->
   <script>
      function confirmDelete(getLink) {
         Swal.fire({
            title: "Yakin data akan dihapus ?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
         }).then(result => {
            if (result.isConfirmed) {
               window.location.href = getLink;
            }
         })
      }
   </script>

   <!-- Pesan Insert -->
   <?php if (isset($_SESSION['success_insert'])) { ?>
      <script>
         Swal.fire({
            position: "top-end",
            icon: "success",
            title: "<?= $_SESSION['success_insert'] ?>",
            showConfirmButton: false,
            timer: 3000
         })
      </script>
   <?php unset($_SESSION['success_insert']);
   } ?>

   <?php if (isset($_SESSION['error_insert'])) { ?>
      <script>
         Swal.fire({
            position: "top-end",
            icon: "error",
            title: "<?= $_SESSION['error_insert'] ?>",
            showConfirmButton: false,
            timer: 3000
         })
      </script>
   <?php unset($_SESSION['error_insert']);
   } ?>

   <!-- Pesan Update -->
   <?php if (isset($_SESSION['success_update'])) { ?>
      <script>
         Swal.fire({
            position: "top-end",
            icon: "success",
            title: "<?= $_SESSION['success_update'] ?>",
            showConfirmButton: false,
            timer: 3000
         })
      </script>
   <?php unset($_SESSION['success_update']);
   } ?>

   <?php if (isset($_SESSION['error_update'])) { ?>
      <script>
         Swal.fire({
            position: "top-end",
            icon: "error",
            title: "<?= $_SESSION['error_update'] ?>",
            showConfirmButton: false,
            timer: 3000
         })
      </script>
   <?php unset($_SESSION['error_update']);
   } ?>

   <!-- Pesan Delete -->
   <?php if (isset($_SESSION['success_delete'])) { ?>
      <script>
         Swal.fire({
            position: "top-end",
            icon: "success",
            title: "<?= $_SESSION['success_delete'] ?>",
            showConfirmButton: false,
            timer: 3000
         })
      </script>
   <?php unset($_SESSION['success_delete']);
   } ?>

   <?php if (isset($_SESSION['error_delete'])) { ?>
      <script>
         Swal.fire({
            position: "top-end",
            icon: "error",
            title: "<?= $_SESSION['error_delete'] ?>",
            showConfirmButton: false,
            timer: 3000
         })
      </script>
   <?php unset($_SESSION['error_delete']);
   } ?>
</body>

</html>