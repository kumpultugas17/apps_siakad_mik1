<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>LOGIN</title>
   <!-- Bootstrap -->
   <link rel="stylesheet" href="assets/css/bootstrap.css">
   <style>
      body {
         background-color: #f2f7ff;
      }
   </style>
</head>

<body>
   <main class="vh-100">
      <div class="container py-5 h-100">
         <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
               <div class="card text-dark rounded-4 border-0">
                  <div class="card-body p-5 text-center">
                     <div class="mb-2 mt-md-4 pb-5">
                        <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                        <p class="text-dark mb-5">Please enter your login and password!</p>
                        <form action="" method="post">
                           <div class="form-floating mb-3">
                              <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                              <label class="form-label" for="email">Email</label>
                           </div>
                           <div class="form-floating mb-3">
                              <input type="password" id="pws" name="pws" class="form-control" placeholder="Password" required>
                              <label class="form-label" for="pws">Password</label>
                           </div>
                           <p class="small mb-3 pb-lg-2">
                              <a class="text-dark" href="#!">Lupa Password?</a>
                           </p>
                           <button class="btn btn-outline-dark btn-lg px-5" name="login" type="submit">Login</button>
                        </form>
                     </div>
                     <div>
                        <p class="mb-0">
                           Belum punya akun? <a href="admin/registrasi_admin.php" class="text-dark fw-bold">Daftar</a>
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>

   <!-- Bootstrap JS -->
   <script src="assets/js/bootstrap.bundle.js"></script>
</body>

</html>

<?php
require_once 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $email = $_POST['email'];
   $pws = md5($_POST['pws']);

   echo $email . '<br>';
   echo $pws;

   $query = $conn->query("SELECT * FROM user WHERE email = '$email' AND password = '$pws'");
   $data = mysqli_fetch_assoc($query);
   $result = mysqli_num_rows($query);

   if ($result > 0) {
      session_start();
      $_SESSION['username'] = $data['nama_lengkap'];
      $_SESSION['level'] = $data['level'];
      header('Location:admin/index.php');
   }
}
?>