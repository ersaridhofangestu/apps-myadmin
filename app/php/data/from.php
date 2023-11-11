<?php
// koneksi ke data base
include('../inc/connection.php');

// keamanan login 
session_start();
if (!isset($_SESSION['session_username'])) {
  header('location:../log/logout.php');
  exit();
}

// variabel kosong
$name     = "";
$gender   = "";
$address  = "";
$position = "";
$error    = "";
$success  = "";

// post
if (isset($_POST['save'])) {
  $name     = $_POST['name'];
  $gender   = $_POST['gender'];
  $address  = $_POST['address'];
  $position = $_POST['position'];

  if ($name && $gender && $address && $position) {
    $sql = "INSERT INTO `data_karyawan`(`name`, `gender`, `address`, `position`) VALUES ('$name','$gender','$address','$position')";
    $q = mysqli_query($con, $sql);
    if ($q) {
      $success = "Successfully entered new data";
    } else {
      $error = "Error Please try again";
    }
  } else {
    $error = "Please fill in all data";
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
          <a href="/app/home.php">
            <button type="button" class="btn btn-outline-secondary" style="margin-right: 10px">
              HOME
            </button></a>
        </li>
        <li class="nav-item">
          <a href="#"><button type="button" class="btn btn-outline-warning" style="margin-right: 10px">
              CREATE
            </button></a>
        </li>
        <li class="nav-item">
          <a href="../log/logout.php"><button type="button" class="btn btn-outline-danger">
              LOGOUT
            </button></a>
        </li>
      </ul>
    </header>
    <section class="vh-100 gradient-custom">
      <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-12 col-lg-9 col-xl-7">
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px">
              <div class="card-body p-4 p-md-5">
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Create || Edit</h3>
                <?php
                if ($error) {
                ?>
                  <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                  </div>
                <?php } ?>
                <?php
                if ($success) {
                ?>
                  <div class="alert alert-success" role="alert">
                    <?= $success ?>
                  </div>
                <?php
                  header("refresh:1;url=/app/home.php");
                } ?>
                <form action="" method="post">
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control form-control-lg" value="<?php echo $name ?>" />
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="name">Gender</label>
                        <select name="gender" id="gender" class="form-control form-control-lg">
                          <option value=""></option>
                          <option value="Male" <?php if ($gender == 'Mele') echo "selected" ?>>Mele</option>
                          <option value="Male" <?php if ($gender == 'Female') echo "selected" ?>>Female</option>
                        </select>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="address">Address</label>
                          <input type="text" id="address" name="address" class="form-control form-control-lg" value="<?php echo $address ?>" />
                        </div>
                      </div>
                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="position">Position</label>
                          <input type="text" id="position" name="position" class="form-control form-control-lg" value="<?php echo $position ?>" />
                        </div>
                      </div>
                    </div>

                    <div class="mt-4 pt-2">
                      <input type="submit" class="btn btn-outline-info" value="SAVE" name="save" style="position: relative; justify-content: start;" />
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>

</html>