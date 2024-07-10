<?php
session_start();
include '../authentication/koneksi.php';
if (!isset($_SESSION['user'])) {
    header('location:../authentication/login-regis.php');
}
$kdBooking = $_GET['id'];

$id = $_SESSION['user']['id_costumer'];
$query = mysqli_query($koneksi, "SELECT*FROM costumer WHERE id_costumer = $id");
$data = mysqli_fetch_array($query);

$kdBooking = mysqli_real_escape_string($koneksi, $kdBooking);

$query2 = mysqli_query($koneksi, "SELECT * FROM booking LEFT JOIN destination ON destination.id_destinasi = booking.id_destinasi LEFT JOIN villa ON villa.id_villa = booking.id_villa LEFT JOIN transport ON transport.id = booking.id_transport WHERE kd_booking='$kdBooking'");

if ($query2) {
    $ticket = mysqli_fetch_array($query2);
    // Now you can use $barcode as needed
} else {
    // Handle the query error, e.g., display an error message or log the error
    echo "Error: " . mysqli_error($koneksi);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Ataraxia</title>
<link rel="stylesheet" href="../layout/css/style.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<link href="../layout/css/bootstrap.min.css" rel="stylesheet"/>

<!-- Logo Title Bar -->
<link rel="icon" href="../gambar/logo-title.png" type="image/icon" />
</head>
<body>
<!-- Bootstrap JS-->
<script src="../layout/js/bootstrap.min.js"></script>
<script src="../layout/js/popper.min.js"></script>
<!-- Navbar -->
<nav class="navbar fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../gambar/logo.png" alt="Bootstrap" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <img class="offcanvas-title" id="offcanvasNavbarLabel" src="../gambar/logo.png" alt="Bootstrap" height="50">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php?id=<?php echo $id; ?>"><i class="fa-solid fa-user"></i> My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php"><i class="fa-solid fa-house-user"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="destination.php"><i class="fa-solid fa-location-dot"></i> Destination</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="testimoni.php"><i class="fa-solid fa-face-smile"></i> Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php"><i class="fa-solid fa-id-card"></i> Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service.php"><i class="fa-solid fa-user-gear"></i> Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php"><i class="fa-solid fa-building"></i> About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://ataraxianews.000webhostapp.com/"><i class="fa-solid fa-newspaper"></i> News</a>
                    </li>
                    <div class="navbar-nav nav-item nav-link nav-btn">
                        <a class="btn" href="../authentication/logout.php" role="button"><i class="fa-solid fa-right-to-bracket"></i> Log Out</a>
                    </div>
                </ul>
            </div>
        </div>
    </div>
    </nav>
    <script>
        const navEl = document.querySelector('.navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 56) {
                navEl.classList.add('navbar-scrolled');
            } else if (window.scrollY < 56) {
                navEl.classList.remove('navbar-scrolled');
            }
        });
    </script>

<section class="ticket page-content">
    <div class="container py-5">
        <h1 class="fw-bolder text-center mb-3">E-Ticket</h1>
        <div class="card p-3">
            <div class="card-body">
                <div class="ticket-header mb-5">
                    <div class="row">
                        <div class="col">
                            <img src="../gambar/logo.png" class="rounded" alt="..." height="80">
                        </div>
                        <div class="col text-end">
                            <div class="row">
                                <div class="barcode">
                                    <h6>Kode Booking</h6>
                                    <img src="../php-barcode/barcode.php?text=<?php echo $ticket['kd_booking']; ?>&print=true&size=45" class="rounded"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="../gambar/transport/<?php echo $ticket['logo'];?>" class="rounded" alt="..." width="80">
                                    </div>
                                    <div class="col">
                                        <span class="fw-bolder"><?php echo $ticket['nama_transport'];?></span>
                                        <p class="fw-light"><?php echo $ticket['kode_transport'];?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col text-center">
                                <span class="fw-bolder">
                                    <?php
                                    if ($ticket['kategori'] == 'VIP') {
                                        echo "Business";
                                    } elseif ($ticket['kategori'] == 'Regular') {
                                        echo "Economy";
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="col text-end">
                                <span class="fw-bolder"><?php echo $ticket['tgl_booking'];?></span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <table class="table table-primary table-striped table-bordered">
                                    <tr class="table-primary">
                                        <td colspan="3" class="text-center"><h4>Flight Detail</h4></td>
                                    </tr>
                                    <tr class="table-primary text-center">
                                        <th class="table-primary">Penerbangan</th>
                                        <th class="table-primary">Keberangkatan</th>
                                        <th class="table-primary">Class</th>
                                    </tr>
                                    <tr class="table-primary text-center">
                                        <td class="table-primary"><?php echo $ticket['kode_transport'];?></td>
                                        <td class="table-primary"><?php echo $ticket['destinasi'];?> - <?php echo $ticket['kode_bandara'];?></td>
                                        <td class="table-primary"><?php
                                    if ($ticket['kategori'] == 'VIP') {
                                        echo "Bussines";
                                    } elseif ($ticket['kategori'] == 'Regular') {
                                        echo "Economi";
                                    }
                                    ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table table-primary table-striped table-bordered">
                                    <tr class="table-primary">
                                        <td colspan="6" class="text-center"><h4>Traveler Detail</h4></td>
                                    </tr>
                                    <tr class="table-primary text-center">
                                        <th class="table-primary">Title</th>
                                        <th class="table-primary">Nama Lengkap</th>
                                        <th class="table-primary">Tanggal Lahir</th>
                                        <th class="table-primary">Phone Number</th>
                                        <th class="table-primary">Email</th>
                                    </tr>
                                    <tr class="table-primary text-center">
                                        <td class="table-primary"><?php echo $ticket['title'];?></td>
                                        <td class="table-primary"><?php echo $ticket['nama'];?></td>
                                        <td class="table-primary"><?php echo $ticket['tgl_lahir'];?></td>
                                        <td class="table-primary"><?php echo $ticket['phone'];?></td>
                                        <td class="table-primary"><?php echo $ticket['email'];?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-5 p-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <table class="table table-primary table-striped table-bordered">
                                    <tr class="table-primary">
                                        <td colspan="4" class="text-center"><h4>Villa Detail</h4></td>
                                    </tr>
                                    <tr class="table-primary text-center">
                                        <th class="table-primary">Nama Villa</th>
                                        <th class="table-primary">Check In</th>
                                        <th class="table-primary">Check Out</th>
                                        <th class="table-primary">Alamat</th>
                                    </tr>
                                    <tr class="table-primary text-center">
                                        <td class="table-primary"><?php echo $ticket['nama_villa'];?></td>
                                        <td class="table-primary"><?php echo $ticket['berangkat'];?></td>
                                        <td class="table-primary"><?php echo $ticket['pulang'];?></td>
                                        <td class="table-primary"><?php echo $ticket['detail_alamat'];?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="footer">
    <div class="footer-top">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
            <img src="../gambar/logo.png" alt="" style="height: 50px" />
        </div>
        <div class="socials">
        <a href="https://www.instagram.com/ataraxia/" class="link-dark"><i class="fa-brands fa-instagram"></i></a>
        <a href="" class="link-dark"><i class="fa-brands fa-twitter"></i></a>
        <a href="" class="link-dark"><i class="fa-brands fa-facebook"></i></a>
        <a href="" class="link-dark"><i class="fa-brands fa-tiktok"></i></a>
        </div>
    </div>
    </div>
    <div class="footer-bottom">
    <div class="container">
        <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1144.5442376490184!2d105.30875159237162!3d-5.113965569563431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1692791627973!5m2!1sid!2sid"
                width="400"
                height="300"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="footer-content">
            <h5>Destination</h5>
            <ul>
                <li><a href="destination.php">Africa</a></li>
                <li><a href="destination.php">America</a></li>
                <li><a href="destination.php">Asia</a></li>
                <li><a href="destination.php">Australia</a></li>
                <li><a href="destination.php">Europe</a></li>
            </ul>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="footer-content">
            <h5>Company</h5>
            <ul>
                <li><a href="about.php">About Us</a></li>
                <li><a href="team.php">Our Team</a></li>
            </ul>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="footer-content">
            <h5>Contact Information</h5>
            <ul>
                <li>
                <a href="https://www.whatsapp.com/?lang=id"><i class="fa-solid fa-phone"></i> +62 851 5684 5840</a>
                </li>
                <li>
                <a href="https://mail.google.com/"><i class="fa-solid fa-envelope"></i> ataraxia@gmail.com</a>
                </li>
                <li>
                <a href=""><i class="fa-solid fa-globe"></i> http://ataraxia.com</a>
                </li>
            </ul>
            <h5>We Accect</h5>
            <div class="card-area">
                <span class="link-light"><i class="fa-brands fa-cc-visa"></i></span>
                <span class="link-light"><i class="fa-solid fa-credit-card"></i></span>
                <span class="link-light"><i class="fa-brands fa-cc-mastercard"></i></span>
                <span class="link-light"><i class="fa-brands fa-cc-paypal"></i></span>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
</body>
</html>
