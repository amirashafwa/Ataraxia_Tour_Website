<?php
session_start();
include '../authentication/koneksi.php';
if (!isset($_SESSION['user'])) {
    header('location:../authentication/login-regis.php');
}
$id = $_SESSION['user']['id_costumer'];
$query = mysqli_query($koneksi, "SELECT*FROM costumer WHERE id_costumer=$id");
$data = mysqli_fetch_array($query);
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
<link rel="stylesheet" href="../layout/css/aos.css">

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

<section class="profile page-content">
    <div class="container py-5">
        <div class="background-profile">
            <img src="../gambar/background-profile.jpg" class="rounded" alt="..." width="100%" height="200px">
        </div>
        <div class="row justify-content-center profile-content">
            <div class="col-10">
                <div class="row">
                    <div class="col-md-4 col-lg-2">
                        <div class="profile-pict mb-3">
                            <?php
                            if ($data['profile_img'] != "") {
                                echo '<img src="../gambar/profile-img/' . $data['profile_img'] . '" class="rounded" alt="..." width="150" height="150">';
                            } else {
                                echo '<img src="../gambar/profile-img/default.jpg" class="rounded" alt="..." width="150" height="150">';
                            }
                            ?>
                            <div class="edit">
                                <a href="edit-profile.php?id=<?php echo $data['id_costumer']; ?>" class="fa-solid fa-user-pen"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col profile-detail">
                        <h3><?php echo $_SESSION['user']['username']?></h3>
                        <div class="loc">
                            <i class="fa-solid fa-envelope"></i><span> <?php echo $data['email']; ?></span>
                        </div>
                        <p>
                            <?php 
                                if ($data['bio'] != "") {
                                    echo $data['bio'];
                                } else {
                                    echo "No bio yet";
                                }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs d-flex justify-content-evenly" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="history-tab" data-bs-toggle="tab" data-bs-target="#history-tab-pane" type="button" role="tab" aria-controls="history-tab-pane" aria-selected="true">History</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="favorite-tab" data-bs-toggle="tab" data-bs-target="#favorite-tab-pane" type="button" role="tab" aria-controls="favorite-tab-pane" aria-selected="false">Favorite</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="history-tab-pane" role="tabpanel" aria-labelledby="history-tab" tabindex="0">
                <div class="tiket">
                    <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM booking LEFT JOIN destination ON destination.id_destinasi = booking.id_destinasi LEFT JOIN villa ON villa.id_villa = booking.id_villa LEFT JOIN transport ON transport.id = booking.id_transport LEFT JOIN payment on payment.kd_booking = booking.kd_booking WHERE id_costumer=$id and card_name != ''");
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                    <div class="card my-5">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h6><?php echo $data['destinasi'];?></h6>
                                    <h3><?php echo $data['kode_bandara'];?></h3>
                                </div>
                                <div class="col">
                                    <h6>Flight</h6>
                                    <h3><?php echo $data['kode_transport'];?></h3>
                                </div>
                                <div class="col text-end">
                                    <h6><?php echo $data['kd_booking']; ?></h6>
                                    <h6><a href="ticket.php?id=<?php echo $data['kd_booking']; ?>">Detail</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                            }
                            ?>
                </div>
            </div>
            <div class="tab-pane fade" id="favorite-tab-pane" role="tabpanel" aria-labelledby="favorite-tab" tabindex="0">
                
            </div>
        </div>
    </div>
</section>


<section class="footer" data-aos="fade-up" data-aos-duration="500">
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

<script src="../layout/js/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>
