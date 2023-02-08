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
   <!-- DataTable -->
   <link rel="stylesheet" href="../../plugins/extensions/dataTables/datatables.min.css">
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

      .btn-create {
         background-color: #0d6efd;
         color: #fff;
         border-color: #0d6efd;
      }

      .btn-create:hover {
         background-color: #0b5ed7;
         color: #fff;
         border-color: #0b5ed7;
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
                           Mahasiswa
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
                  <table class="table table-striped" id="dataMhs">
                     <thead class="align-middle table-dark">
                        <tr>
                           <th class="text-center">No</th>
                           <th>NIM</th>
                           <th>Nama Lengkap</th>
                           <th>Jenis Kelamin</th>
                           <th>Agama</th>
                           <th>Telepon</th>
                           <th>Email</th>
                           <th>Tahun Akademik</th>
                           <th class="text-center">Status</th>
                           <th class="text-center">Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        require_once '../../config.php';

                        $no = 1;
                        $query = $conn->query("SELECT * FROM mahasiswa ORDER BY created_at DESC");
                        foreach ($query as $data) :
                           // Kondisi untuk status mahasiswa
                           if ($data['status'] == 2) {
                              $status = "<span class='badge text-bg-success'>Lulus</span>";
                           } elseif ($data['status'] == 1) {
                              $status = "<span class='badge text-bg-primary'>Aktif</span>";
                           } else {
                              $status = "<span class='badge text-bg-danger'>Tidak Aktif</span>";
                           }
                        ?>
                           <tr>
                              <td class="text center"><?= $no++ ?></td>
                              <td><?= $data['nim'] ?></td>
                              <td><?= $data['nama'] ?></td>
                              <td><?= $data['jk'] == 'l' ? 'Laki-laki' : 'Perempuan' ?></td>
                              <td><?= $data['agama'] ?></td>
                              <td><?= $data['telp'] ?></td>
                              <td><?= $data['email'] ?></td>
                              <td><?= $data['tahun_akademik'] ?></td>
                              <td><?= $status ?></td>
                              <td class="text-center">
                                 <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $data['id_mhs'] ?>">
                                    <i class="bi bi-pencil-square"></i>
                                 </button>
                                 <button class="btn btn-sm btn-danger" onclick="confirmDelete('delete.php?id=<?= $data['id_mhs'] ?>')">
                                    <i class="bi bi-trash3-fill"></i>
                                 </button>
                              </td>
                           </tr>
                           <!-- Modal Edit -->
                           <div class="modal fade" id="edit<?= $data['id_jur'] ?>" data-bs-backdrop="static" data-bs-keyword="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="staticBackdropLabel">
                                          Edit Jurusan
                                       </h5>
                                       <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                       <form action="update.php" method="POST">
                                          <div class="mb-3">
                                             <label for="kode_jurusan" class="form-label">Kode Jurusan</label>
                                             <input type="hidden" name="id_jur" value="<?= $data['id_jur'] ?>">
                                             <input type="text" name="kode_jurusan" id="kode_jurusan" class="form-control" value="<?= $data['kode_jurusan'] ?>">
                                          </div>
                                          <div class="mb-3">
                                             <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
                                             <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-control" value="<?= $data['nama_jurusan'] ?>">
                                          </div>
                                          <div class="mb-3">
                                             <label for="status" class="form-label">Status</label>
                                             <select name="status" id="status" class="form-select">
                                                <option selected disabled>Pilih Jurusan</option>
                                                <option <?= $data['status_jurusan'] == '1' ? 'selected' : '' ?> value="1">Aktif</option>
                                                <option <?= $data['status_jurusan'] == '0' ? 'selected' : '' ?> value="0">Tidak Aktif</option>
                                             </select>
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
   <!-- DataTables -->
   <script src="../../plugins/extensions/dataTables/datatables.min.js"></script>
   <script>
      $(document).ready(function() {
         let tableMhs = $('#dataMhs').DataTable({
            lengthChange: false,
            buttons: [{
                  className: 'btn-create btn-sm',
                  text: 'Tambah',
                  action: function(e) {
                     window.location.href = 'create.php'
                  }
               },
               {
                  className: 'btn-success btn-sm',
                  extend: 'excel',
                  text: 'Excel'
               },
               {
                  className: 'btn-danger btn-sm',
                  extend: 'pdf',
                  text: 'PDF'
               }
            ]
         });
         tableMhs.buttons().container()
            .appendTo('#dataMhs_wrapper .col-md-6:eq(0)');
      });
   </script>

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