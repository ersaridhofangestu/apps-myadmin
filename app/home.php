<?php
// koneksi ke mysql
include 'php/inc/connection.php';

session_start();
if (!isset($_SESSION['session_username'])) {
  header('location:../app/php/log/login.php');
  exit();
}

// variabel kosong
$name = "";
$gender = "";
$address = "";
$position = "";
$error = "";
$success = "";


if (isset($_GET['op'])) {
  $op = $_GET['op'];
} else {
  $op = '';
}
if ($op == "delete") {
  $id   = $_GET['id'];
  $sql  = "DELETE FROM `data_karyawan` WHERE id = '$id'";
  $q    = mysqli_query($con, $sql);
  if ($q) {
    $success = "successfully deleted data";
  } else {
    $error   = "failed to delete";
  }
}
if ($op == 'edit') {
  $id   = $_GET['id'];
  $sql  = "SELECT * FROM `data_karyawan` WHERE id = '$id'";
  $q    = mysqli_query($con, $sql);
  $r    = mysqli_fetch_array($q);
  $name = $r['name'];
  $gender = $r['gender'];
  $address = $r['address'];
  $position = $r['position'];

  if ($name == "") {
    $error = "Data not found";
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
</head>

<body>
  <div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
          <use xlink:href="#bootstrap" />
        </svg>
        <span class="fs-4">App myadmin</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item">
          <button type="button" class="btn btn-outline-secondary" style="margin-right: 10px">
            HOME
          </button>
        </li>
        <li class="nav-item">
          <a href="../app/php/data/from.php"><button type="button" class="btn btn-outline-warning" style="margin-right: 10px">
              CREATE
            </button></a>
        </li>
        <li class="nav-item">
          <a href="../app/php/log/logout.php"><button type="button" class="btn btn-outline-danger">
              LOGOUT
            </button></a>
        </li>
      </ul>
    </header>
    <div class="card text-center">
      <div class="card-header">Date karyawan</div>
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Name</th>
              <th scope="col">Gender</th>
              <th scope="col">Address</th>
              <th scope="col">Position</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM data_karyawan order by id desc";
            $q   = mysqli_query($con, $sql);
            $no  = 1;
            while ($row = mysqli_fetch_array($q)) :
              $id       = $row['id'];
              $name     = $row['name'];
              $gender   = $row['gender'];
              $address  = $row['address'];
              $position = $row['position'];
            ?>
              <tr>
                <th scope="row"><?= $no++ ?></th>
                <th scope="row"><?= $name ?></th>
                <th scope="row"><?= $gender ?></th>
                <th scope="row"><?= $address ?></th>
                <th scope="row"><?= $position ?></th>
                <th scope="row">
                  <a href="../app/php/data/edit.php?op=edit&id=<?= $id ?>" class="btn btn-warning">Edit</a>
                  <a href="home.php?op=delete&id=<?= $id ?>" class="btn btn-danger" onclick="return confirm('Do you want to delete this data?')">Delete</a>
                </th>
              </tr>
            <?php endwhile ?>
          </tbody>
        </table>
      </div>
      <div class="card-footer text-body-secondary">2023</div>
    </div>
  </div>
</body>

</html>