<?php
session_start();
include '../authentication/koneksi.php';
if (!isset($_SESSION['user'])) {
    header('location:../authentication/login-regis.php');
}

$id = $_SESSION['user']['id_costumer'];


if (isset($_POST['book-btn'])) {
    $query = mysqli_query($koneksi, "SELECT max(kd_booking) as kode FROM booking");
    $data = mysqli_fetch_array($query);
    $kodeBooking = $data['kode'];
    $urutan = (int) substr($kodeBooking, 3, 3);
    $urutan++;
    $huruf = "ATX";


    $kodeBooking = $huruf . sprintf("%03s", $urutan);
    $costumer = $_SESSION['user']['id_costumer'];
    $asal = $_POST['asal'];
    $tujuan = $_POST['tujuan'];
    $berangkat = $_POST['berangkat'];
    $pulang = $_POST['pulang'];
    $kategori = $_POST['kategori'];
    $transport = $_POST['transport'];
    $villa = $_POST['villa'];
    $title = $_POST['title'];
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $waktu = date('d-m-Y H:i:s');
    $request = $_POST['request'];
    $tamu = $_POST['tamu'];

    $query= mysqli_query($koneksi, "INSERT INTO booking (kd_booking, id_costumer, id_destinasi, id_transport, id_villa, asal, berangkat, pulang, kategori, title, nama, tgl_lahir, phone, email, tgl_booking, request, tamu) VALUES ('$kodeBooking', '$costumer', '$tujuan', '$transport', '$villa', '$asal', '$berangkat', '$pulang', '$kategori', '$title', '$nama', '$tgl_lahir', '$phone', '$email', '$waktu', '$request', '$tamu')");
}

if (isset($_POST['card_name'])) {
    $kodeBooking = $_POST['kd_booking'];
    $card_name = $_POST['card_name'];
    $card_number = $_POST['card_number'];
    $cvv = $_POST['cvv'];
    $expiration = $_POST['expiration'];

    $query = mysqli_query($koneksi, "INSERT INTO payment (kd_booking, card_name, card_number, cvv, expired) VALUES ('$kodeBooking', '$card_name', '$card_number', '$cvv', '$expiration')");
    if ($query) {
        echo "<script>alert('Ubah data berhasil');document.location='profile.php?id=".$id."';</script>";
    } else {
        echo "<script>alert('Tambah data gagal'); document.location='booking.php';</script>";
    }
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
            <?php
            $id = $_SESSION['user']['id_costumer'];
            $query = mysqli_query($koneksi, "SELECT*FROM costumer WHERE id_costumer = $id");
            $data = mysqli_fetch_array($query);
            ?>
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
                        <a class="btn" href="../authentication/logout.php" role="button"><i class="fa-solid fa-right-from-bracket"></i> Log Out</a>
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

<form action="" method="post">
    <section class="payment page-content">
        <div class="container py-5">
            <div class="row">
                <div class="col col-lg-8">
                    <div class="card left-payment p-5">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <h5>Kode Booking</h5>
                                </div>
                                <div class="col">
                                    <input type="text" readonly class="form-control-plaintext text-end" id="floatingPlaintextInput" placeholder="name@example.com" value="<?php echo $kodeBooking; ?>" name="kd_booking">
                                </div>
                            </div>
                        </div>
                        <span class="payment-text">SELECT PAYMENT METHOD</span>
                        <div class="row">
                            <div class="col payment-method">
                                <div class="row">
                                    <div class="col">
                                        <input type="radio" name="method" class="btn-check radio" id="method1" checked>
                                        <label for="method1" class="form-control text-center py-2">
                                            <span><i class="fa-regular fa-credit-card" style="color: black;"></i> Credit Card</span>
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input type="radio" name="method" class="btn-check radio" id="method2">
                                        <label for="method2" class="form-control text-center py-2">
                                            <span><i class="fa-solid fa-building-columns" style="color: black;"></i> Bank Transfer</span>
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input type="radio" name="method" class="btn-check radio" id="method3">
                                        <label for="method3" class="form-control text-center py-2">
                                            <span><i class="fa-brands fa-paypal" style="color: black;"></i> Paypal</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6>Name On Card</h6>
                                <input type="text" class="form-control" placeholder="Mr. xxxxxx" name="card_name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6>Card Number</h6>
                                <input type="text" class="form-control" placeholder="1234-1234-1234-1234" name="card_number" required>
                            </div>
                            <div class="col">
                                <h6>Expiration</h6>
                                <input type="month" class="form-control" name="expiration" required>
                            </div>
                            <div class="col">
                                <h6>CVV</h6>
                                <input type="number" class="form-control" placeholder="1234" name="cvv" required>
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="col payment-right">
                    <div class="row">
                        <div class="col">
                            <div class="card px-5 pt-5">
                                <div class="row">
                                    <div class="col">
                                        <span class="payment-text">ORDER SUMARY</span>
                                        <div class="border"></div>
                                        <div class="payment-name"><b><?php echo $nama; ?></b></div>
                                        <p><?php 
                                        if (isset($request)) {
                                            echo $request;
                                        } else {
                                            echo "No request";
                                        }
                                        ?></p>
                                        <div class="row">
                                            <div class="col">
                                                <p>Price amount</p>
                                            </div>
                                            <div class="col">
                                                <p><b>$15.000</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="card text-center bg-primary text-light">
                                <p>MONDAY</p>
                                <p><?php echo $waktu; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <button class="btn btn-primary" type="submit">PURCHASE NOW</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>


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
