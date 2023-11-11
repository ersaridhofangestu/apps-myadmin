<?php
// wajib di gunakan apa bila menggunakan varibel session
session_start();

//memanggil file connection.php
include '../inc/connection.php';

// variable kosing
$username = "";
$error = "";


// konfigurasi login apps
if (isset($_POST['login'])) {
  // Menggunakan mysqli_real_escape_string untuk mencegah serangan SQL injection.
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  // logik 
  if (empty($username) || empty($password)) {
    $error = "Silakan masukkan username dan password";
  } else {
    //mencocokan data dari mysql
    $sql = "SELECT * FROM login_apps WHERE username = '$username'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
      die("Query gagal: " . mysqli_error($con));
    }

    $row = mysqli_fetch_assoc($result);

    if (!$row) {
      $error = "Username tidak tersedia";
    } else if (!password_verify($password, $row['password'])) {
      $error = "Password yang dimasukkan tidak sesuai";
    }


    // ketika berhasil akan masuk ke halaman lain
    if (empty($error)) {
      $_SESSION['session_username'] = $username;
      header("location:/app/home.php");
      exit();
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- css main -->
  <link rel="stylesheet" href="/app/src/style.css" />
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Carter+One&family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&family=Teko:wght@300;600&display=swap" rel="stylesheet" />
  <!-- icon google -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- title -->
  <title>login</title>

  <!-- style -->
  <style>
    .card-header {
      font-family: "Toko", SemiBold;
      font-size: 30px;
      background-color: rgb(217, 220, 220);
      color: aliceblue;
    }

    .form-label {
      font-family: "Toko", Light;
    }
  </style>
</head>

<body>
  <!-- card start -->
  <div class="card container w-50 p-3 position-absolute top-50 start-50 translate-middle">

    <!-- heading start-->
    <div class="card-header bg-secondary">Login</div>

    <!-- card email start -->
    <div class="card-body">

      <!-- information start -->
      <?php if ($error) { ?>
        <div class="alert alert-danger" role="alert"><?= $error ?></div>
      <?php } ?>
      <!-- information end -->

      <!-- from important -->
      <form action="" method="post">
        <label class="form-label" for="username">Nama Pengguna :</label>
        <input type="text" class="form-control" name="username" id="username" placeholder="" value="<?php echo htmlspecialchars($username); ?>" autocomplete="off" />
    </div>
    <!-- card username end-->

    <!-- card password start -->
    <div class="card-body">
      <label class="form-label" for="password">Kata Sandi :</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="" />
    </div>
    <!-- card password end -->

    <!-- buttton input -->
    <input type="submit" class="btn btn-outline-secondary" name="login" value="Login">
    </form>

    <!-- card end -->
  </div>

</body>
</body>

</html>