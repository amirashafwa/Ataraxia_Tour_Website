<?php
session_start();
include '../authentication/koneksi.php';
if (!isset($_SESSION['user']['level'])) {
    header('location:../authentication/login-regis.php');
}
$id = $_SESSION['user']['id_admin'];
$query = mysqli_query($koneksi, "SELECT*FROM admin WHERE id_admin=$id");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ataraxia - Admin Page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../gambar/logo-title.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<script src="../../layout/js/sweetalert2.all.min.js"></script>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">Admin Page</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <?php
            if ($data['foto'] != "") {
                echo '<img src="../gambar/profile-img/' . $data['foto'] . '" class="rounded-circle" alt="..." width="35" height="35">';
            } else {
                echo '<img src="../gambar/profile-img/default.jpg" class="rounded-circle" alt="..." width="35" height="35">';
            }
            ?>
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php
								echo isset($_SESSION['user']['name']) ? $_SESSION['user']['name'] : $_SESSION['user']['name'];
								?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo isset($_SESSION['user']['name']) ? $_SESSION['user']['name'] : $_SESSION['user']['name'];
								?></h6>
              <span><?php echo isset($_SESSION['user']['level']) ? $_SESSION['user']['level'] : $_SESSION['user']['level'];
								?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="?page=admin-profile&id=<?php echo $data['id_admin']; ?>">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../authentication/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-heading">Data</li>
      <?php
            if ($_SESSION['user']['level'] != 'petugas') {
              if ($_SESSION['user']['level'] == 'super admin') {
					?>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="">
            <i class="bi bi-person"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="admin.php?page=admin/admin-data">
                <i class="bi bi-circle"></i><span>Admin</span>
              </a>
            </li>
            <li>
              <a href="admin.php?page=costumer/costumer-data">
                <i class="bi bi-circle"></i><span>Costumer</span>
              </a>
            </li>
          </ul>
        </li>
        <?php
            }
        ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="admin.php?page=destination/destination-data">
          <i class="bi bi-geo-alt"></i>
          <span>Destination</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="admin.php?page=contact/contact-data">
          <i class="bi bi-star"></i>
          <span>Contact</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Accommodation</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="admin.php?page=villa/villa-data">
              <i class="bi bi-circle"></i><span>Villa</span>
            </a>
          </li>
          <li>
            <a href="admin.php?page=transport/transport-data">
              <i class="bi bi-circle"></i><span>Transport</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
      <?php
      }
      ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Booking</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="admin.php?page=booking/booking-data">
              <i class="bi bi-circle"></i><span>Booking</span>
            </a>
          </li>
          <li>
            <a href="admin.php?page=payment/payment-data">
              <i class="bi bi-circle"></i><span>Payment</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="container-fluid p-0">
      <?php
      $page = isset($_GET['page']) ? $_GET['page'] : 'home';
      include $page . '.php';
      ?>
    </div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      Copyright &copy; <strong><span>Ataraxia</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>